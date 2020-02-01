<?php

namespace App\Http\Controllers;

use App\Seller;
use App\City;
use App\Item;
use App\DocumentType;
use Illuminate\Http\Request;
use App\Http\Requests\Sellers\StoreRequest;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $search = $request->get('searchfor');

        $documentTypes = DocumentType::all();
        $sellers = Seller::orderBy('name')
            ->seller($request->get('seller_id'))
            ->documenttype($request->get('document_type_id'))
            ->document($request->get('document'))
            ->email($request->get('email'))
            ->searchfor($type, $search)
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
        $cities = City::all();
        return response()->view('sellers.create', [
            'seller' => new Seller,
            'document_types' => $documentTypes,
            'cities' => $cities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
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
        $cities = City::all();
        $documentTypes = DocumentType::all();
        return response()->view('sellers.edit', [
            'seller' => $seller,
            'document_types' => $documentTypes,
            'cities' => $cities,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreRequest $request
     * @param Seller $seller
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreRequest $request, Seller $seller)
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
