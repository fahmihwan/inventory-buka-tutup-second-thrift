<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use App\Models\Category_brand;
use App\Models\Category_product;
use App\Models\Detail_brand;
use App\Models\Item;
use App\Models\Manage_item;
use App\Models\Receiving;
use Illuminate\Http\Request;

class Manage_itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('pages.transaction.manage_item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->detail_brand_id);
        // dd($request->category_brand_id);
        // dd($request->category_product_id);
        $getItem = Item::where('detail_brand_id', '=', $request->category_product_id)
            ->where('category_brand_id', '=', $request->category_brand_id);


        if ($getItem->exists() == null) { //cek jika tidak ada
            return redirect()->back();
        }


        // where('category_brand_id', '=', $request->category_brand_id)

        dd($getItem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receiving = Receiving::with('category_product')
            ->where(['ball_number' => $id])->first();

        $get_id_from_receiving = $receiving->id;


        $manage_item = Manage_item::with(['item.category_brand', 'item.detail_brand'])
            ->where(['receiving_id' => $get_id_from_receiving])
            ->get();

        return view('pages.transaction.manage_item.index', [
            'manage_item' => $manage_item,
            'receiving' => $receiving,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function create_manage_receiving($ball_number)
    {
        $receiving =  Receiving::with(['category_product:id,name'])
            ->where('ball_number', $ball_number)->first();


        $category_brand = Category_brand::latest()->get();

        $detail_brand = Detail_brand::latest()->get();

        return view('pages.transaction.manage_item.create', [
            'receiving' => $receiving,
            'category_brand' => $category_brand,
            'detail_brand' => $detail_brand,
        ]);
    }
}
