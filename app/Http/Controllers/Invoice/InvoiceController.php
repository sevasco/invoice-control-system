<?php

namespace App\Http\Controllers;

use App\Status;
use App\Invoice;
use App\Item;
use App\Seller;
use App\User;
use App\Customer;
use Illuminate\Http\Request;
use App\Exports\InvoicesExport;
use App\Imports\InvoicesImport;
use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $search = $request->get('searchfor');

        $invoices = Invoice::with(['customer', 'seller'])
            ->searchfor($type, $search)
            ->paginate(10);

        return view('invoices.index', compact( 'invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Invoice $invoice)
    {
        $customers = Customer::all();
        $sellers = Seller::all();
        $statuses = Status::all();
        $items = Item::all();

        return view('invoices.create',[
            'invoices' => new invoice,
            'sellers' => $sellers,
            'customers' => $customers,
            'invoice' => $invoice,
            'statuses'=> $statuses,
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        Invoice::create($request->validated());


        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @param Item $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Invoice $invoice)
    {
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();

        $items = Item::whereNotIn('id', $invoice->items->pluck('id')->values())->get();

        return view('invoices.show', compact( 'sellers', 'customers', 'users', 'invoice', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();

        return view('invoices.edit', compact( 'sellers', 'customers', 'users', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Invoice $invoice)
    {
        $invoice->issued_at = $request->input('issued_at');
        $invoice->expired_at = $request->input('expired_at');
        $invoice->received_at = $request->input('received_at');
        $invoice->seller_id = $request->input('seller_id');
        $invoice->sale_description = $request->input('sale_description');
        $invoice->customer_id = $request->input('customer_id');
        $invoice->status = $request->input('status');
        $invoice->user_id = auth()->user()->id;

        $invoice->save();

        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index');
    }

    public function addProduct(Invoice $invoice, DetailRequest $request)
    {
        $price = $request->input('product_price');
        $quantity = $request->input('product_quantity');
        $totalPrice = $price * $quantity;
        $vat = $totalPrice * 0.19;

        $invoice->items()->attach($request->input('product_id'), [
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $invoice->vat += $vat;
        $invoice->total += $totalPrice;
        $invoice->total_with_vat += $totalPrice + $vat;

        $invoice->save();

        return redirect()->route('invoices.show', $invoice);
    }

    public function updateProduct(Invoice $invoice, UpdateRequest $request)
    {
        $price = $request->input('product_price');
        $quantity = $request->input('product_quantity');
        $totalPrice = $price * $quantity;
        $vat = $totalPrice * 0.19;

        $invoice->items()->updateExistingPivot($request->input('product_id'), [
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $invoice->vat += $vat;
        $invoice->total += $totalPrice;
        $invoice->total_with_vat += $totalPrice + $vat;

        $invoice->save();

        return redirect()->route('invoices.show', $invoice);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new InvoicesImport, $file);

        return back()->with('message', 'Invoice import succesfully');
    }
}

