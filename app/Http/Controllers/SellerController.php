<?php

namespace App\Http\Controllers;

use App\Seller;
use App\DocumentType;
use Illuminate\Http\Request;
use App\Http\Requests\SaveSellerRequest;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $documentTypes = DocumentType::all();
        $sellers = Seller::orderBy('name')
            ->seller($request->get('seller_id'))
            ->documenttype($request->get('document_type_id'))
            ->document($request->get('document'))
            ->email($request->get('email'))
            ->paginate(10);
        return response()->view('sellers.index', [
            'sellers' => $sellers,
            'request' => $request,
            'document_types' => $documentTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentTypes = DocumentType::all();
        return response()->view('sellers.create', [
            'seller' => new Seller,
            'document_types' => $documentTypes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveSellerRequest $request)
    {
        Seller::create($request->validated());

        return redirect()->route('sellers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return response()->view('sellers.show', [
            'seller' => $seller,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        $documentTypes = DocumentType::all();
        return response()->view('sellers.edit', [
            'seller' => $seller,
            'document_types' => $documentTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveSellerRequest $request
     * @param Seller $seller
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveSellerRequest $request, Seller $seller)
    {
        $seller->update($request->validated());

        return redirect()->route('sellers.show', $seller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Seller $seller) {
        $seller->delete();

        return redirect()->route('sellers.index');
    }

    /**
     * Display the specified resource filtering by name.
     * @param Request $request
     */
    public function search(Request $request) {
        $sellers = Seller::where('name', 'like', '%'. $request->name .'%')
            ->orderBy('name')
            ->limit('100')
            ->get();
        echo $sellers;
    }
}
