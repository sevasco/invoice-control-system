<?php

namespace App\Http\Controllers;

use App\Status;
use App\Invoice;
use Illuminate\Http\Request;
use App\Exports\InvoicesExport;
use App\Imports\InvoicesImport;
use App\Http\Requests\SaveInvoiceRequest;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $invoices = Invoice::orderBy('id', 'DESC')
            ->number($request->get('number'))
            ->status($request->get('state_id'))
            ->customer($request->get('customer_id'))
            ->seller($request->get('seller_id'))
            ->item($request->get('item_id'))
            ->issuedDate($request->get('issued_init'), $request->get('issued_final'))
            ->expiredDate($request->get('expired_init'), $request->get('expired_final'))
            ->paginate(10);
        return response()->view('invoices.index', [
            'invoices' => $invoices,
            'statuses' => Status::all(),
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return response()->view('invoices.create', [
            'invoice' => new Invoice,
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveInvoiceRequest $request) {
        $result = Invoice::create($request->validated());

        return redirect()->route('invoices.show', $result->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice) {
        return response()->view('invoices.show', [
            'invoice' => $invoice,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice) {
        return response()->view('invoices.edit', [
            'invoice' => $invoice,
            'statuses' => Status::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveInvoiceRequest $request
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveInvoiceRequest $request, Invoice $invoice) {
        $invoice->update($request->validated());

        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Invoice $invoice) {
        $invoice->delete();

        return redirect()->route('invoices.index');
    }

    /**
     * Export a listing of the resource.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcel() {
        return Excel::download(new InvoicesExport, 'invoices-list.xlsx');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response & \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function importExcel(Request $request) {
        $this->validate($request, [
            'invoices' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('invoices');
        try {
            Excel::import(new InvoicesImport(), $file);
            return redirect()->route('invoices.index');
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures_unsorted = $e->failures();
            $failures_sorted = array();
            foreach($failures_unsorted as $failure) {
                $failures_sorted[$failure->row()][$failure->attribute()] = $failure->errors()[0];
            }
            return response()->view('invoices.importErrors', [
                'failures' => $failures_sorted,
            ]);
        }
    }
}
