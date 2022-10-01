<?php

namespace App\Http\Controllers\master_item;

use App\Http\Controllers\Controller;
use App\Models\Category_brand;
use App\Models\Category_product;
use App\Models\Detail_brand;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::with([
            'category_brand:id,name',
            'detail_brand:id,name',
            'category_product:id,name',
        ])->get();

        return view('pages.master_item.item.index', [
            'items' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category_brand = Category_brand::all();
        $category_product = Category_product::all();
        $detail_brand = Detail_brand::all();

        return view('pages.master_item.item.create', [
            'category_brand' => $category_brand,
            'category_product' => $category_product,
            'detail_brand' => $detail_brand,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_product_id' => 'required',
            'category_brand_id' => 'required',
            'detail_brand_id' => 'required',
            'qty' => 'required|numeric'
        ]);

        Item::create($validated);
        return redirect('master/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Item::with([
            'category_brand:id,name',
            'category_product:id,name',
            'detail_brand:id,name'
        ])->where('id', $id)->first();

        $category_brand = Category_brand::all();
        $category_product = Category_product::all();
        $detail_brand = Detail_brand::all();

        return view('pages.master_item.item.edit', [
            'category_brand' => $category_brand,
            'category_product' => $category_product,
            'detail_brand' => $detail_brand,
            'data_edit' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $validated = $request->validate([
            'category_product_id' => 'required',
            'category_brand_id' => 'required',
            'detail_brand_id' => 'required',
            'qty' => 'required|numeric'
        ]);

        Item::where('id', $id)->update($validated);
        return redirect('master/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::where('id', $id)->delete();
        return redirect('master/item');
    }

    public function store_detail_brand(Request $request)
    {
        $validated =  $request->validate([
            'name' => 'required|unique:detail_brands',
        ]);

        Detail_brand::create($validated);
        return redirect('master/item/create');
    }
}
