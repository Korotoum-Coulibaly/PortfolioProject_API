<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

/**
 * @group Product management
 *
 * APIs for managing Product
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all products
        $products = Product::all();

        //return response in json
        return response()->json($products);
    }

    /**
     * Show the form for creating a new Product.
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
        //verification des paramètres entré, s'assurer que le password est de la forme test@123password
        $request->validate([
            'libelle' => ['required', 'string', 'max:255'],
        ]);

        //Opération d'insertion dans la base de donnée
        $product = Product::create([
            'libelle' => $request->libelle,
            'plan' => $request->plan,
            'price' => $request->price,
            ]);

        //retourner la reponse en json
        return response()->json($product);

    }

    /**
     * Display the specified Product.
     *
     * @param  int  $id_product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json($product);

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
    public function update(Request $request,Product $product)
    {
        //Modification operation in the database
        //the data must be displayed in the field, and sent along with the modified data
        $product->update([
            'libelle' => $request->libelle,
            'plan' => $request->plan,
            'price' => $request->price,

             ]);
        //dd($product);
        //return response in json
        return response()->json($product);
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        // return response in json
        return response()->json($product);
    }
}
