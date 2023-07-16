<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pack_product;
use App\Models\Pack;

/**
 * @group Product for each pack management
 *
 * APIs for managing users Product for each pack
 */
class PackProductController extends Controller
{
    /**
     * Display a listing of the Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //associate pack with product
        $pack_products = Pack_product::all();

        //return response in json
        return response()->json($pack_products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Insert operation into the database
         $PackProduct = Pack_product::create([
            'pack_id' => $request->pack_id,
            'product_id' => $request->product_id,
   ]);

        //return the response in json
        return response()->json($PackProduct);
    }

    /**
     * Display the specified Product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pack_product $pack_product)
    {
        return response()->json($pack_product);

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
     * Update the specified Product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pack_product $pack_product)
    {
        $pack_product->update([
            'pack_id' => $request->pack_id,
            'product_id' => $request->product_id,
        ]);
        //dd($pack_product);
        //return response in json
        return response()->json($pack_product);
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pack_product $pack_product)
    {
        $pack_product->delete();
        // return response in json
        return response()->json($pack_product);

    }

    /**
     * Show product of all pack from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function showproductofallpack()
    {
        $product_pack = Pack::with(['pack_product' => function ($query) {
            $query->with('product');

        }])
        ->get();
        //dd($product_pack);
        return response()->json($product_pack);

    }

    /**
     * Show product of one pack from storage.
     *
     * @param  int  $id_pack
     * @return \Illuminate\Http\Response
     */
    public function showproductofonepack($id_pack)
    {
        $product_pack = Pack::with(['pack_product' => function ($query) {
            $query->with('product');

        }])
        ->where('id_pack', '=', $id_pack)
        ->get();
        //dd($product_pack);
        return response()->json($product_pack);

    }


}
