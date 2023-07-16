<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\Sub_categorie;
use App\Models\Categorie;

/**
 * @group Packs management
 *
 * APIs for managing Packs
 */
class PackController extends Controller
{
    /**
     * Display a listing of the Packs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all package
        $packs = Pack::with(['subcategory' => function ($query) {
            $query->inRandomOrder()
            ->with(['category' => function ($query) {
                $query->inRandomOrder();
            }])
            ->whereHas('category');
        }])
        ->whereHas('subcategory')

        ->get();

        //return response in json
        return response()->json($packs);
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
     * Store a newly created Packs in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //verification des paramètres entré, s'assurer que le password est de la forme test@123password
         $request->validate([
            'libelle' => ['required', 'string', 'max:255'],
            'sub_categorie_id' => ['required', 'integer'],
            'microsoft_price' => ['required','between:0,99.99'],
            'sale_price' => ['required', 'between:0,99.99'],
            'dollar_cost' => ['required', 'between:0,99.99'],
        ]);
        //Opération d'insertion dans la base de donnée
        $pack = Pack::create([
            'libelle' => $request->libelle,
            'sub_categorie_id' => $request->sub_categorie_id,
            'microsoft_price' => $request->microsoft_price,
            'sale_price' => $request->sale_price,
            'dollar_cost' => $request->dollar_cost,
            ]);

             //retourner la reponse en json
        return response()->json($pack);

    }

    /**
     * Display the specified Packs.
     *
     * @param  int  $id_pack
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pack =  Pack::with(['subcategory' => function ($query) {
            $query->inRandomOrder()
            ->with(['category' => function ($query) {
                $query->inRandomOrder();
            }])
            ->whereHas('category');
        }])
        ->where('id_pack', '=' , $id)
        ->whereHas('subcategory')
        ->get();
        return response()->json($pack);

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
     * Update the specified Packs in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_pack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pack $pack)
    {
        $pack->update([
            'libelle' => $request->libelle,
            'sub_categorie_id' => $request->sub_categorie_id,
            'microsoft_price' => $request->microsoft_price,
            'sale_price' => $request->sale_price,
            'dollar_cost' => $request->dollar_cost,
          ]);
        //dd($pack);
        //return response in json
        return response()->json($pack);
    }

    /**
     * Remove the specified Packs from storage.
     *
     * @param  int  $id_pack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pack $pack)
    {
        $pack->delete();
        // return response in json
        return response()->json($pack);
    }

     /**
     * Show all pack of Sub Categorie from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function Showallpackofsubcategorie()
    {
        //dd($id_subcategorie);
        $subcategorie = Sub_categorie::with(['pack' => function ($query) {
            $query->inRandomOrder();

        }])
        ->whereHas('pack')
        ->get();
        //dd($subcategorie);
        return response()->json($subcategorie);

    }

    /**
     * Show all pack of one Sub Categorie from storage.
     *
     * @param  int  $id_subcategorie
     * @return \Illuminate\Http\Response
     */
    public function Showpackofsubcategorie($id_subcategorie)
    {
        //dd($id_subcategorie);
        $subcategorie = Sub_categorie::with(['pack' => function ($query) {
            $query->inRandomOrder();

        }])
        ->whereHas('pack')
        ->where('id_sub_categorie','=', $id_subcategorie)
        ->get();
        //dd($subcategorie);
        return response()->json($subcategorie);

    }

}
