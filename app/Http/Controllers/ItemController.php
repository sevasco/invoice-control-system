<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\SaveItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $type = $request->get('type');
        $search = $request->get('searchfor');

        $item = Item::orderBy('id')
            ->searchfor($type, $search)
            ->paginate(10);
        return response()->view('items.index', [
            'items' => $item,
            'request' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return response()->view('items.create', [
            'item' => new Item
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SaveItemRequest $request) {
        Item::create($request->validated());

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item) {
        return response()->view('items.show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item) {
        return response()->view('items.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveItemRequest $request
     * @param Item $item
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SaveItemRequest $request, Item $item) {
        $item->update($request->validated());

        return redirect()->route('items.show', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Item $item
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Item $item) {
        $item->delete();

        return redirect()->route('items.index');
    }

}
