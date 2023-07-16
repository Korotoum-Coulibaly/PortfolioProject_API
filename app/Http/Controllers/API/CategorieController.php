<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

    //La methode classique que j'ai utilisé pour les autres ne fonctionne pas pour cette table, il doit être dingue
/**
 * @group Categorie management
 *
 * APIs for managing Categorie
 */
class CategorieController extends Controller
{
    /**
     * Display a listing of the Categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //All categories are retrieved
        $categories = Categorie::all();

        //return response in Json file
        return response()->json($categories);

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
     * Store a newly created Categorie in storage.
     *
     * @queryParam libelle string Categorie name.Example: Formation
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Opération d'insertion dans la base de donnée
        $categorie = Categorie::create([
            'libelle' => $request->libelle,
            ]);

        //retourner la reponse en json
        return response()->json($categorie);
    }

    /**
     * Display the specified Categorie.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
        return response()->json($categorie);

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
     * Update the specified Categorie in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->update([
            'libelle' => $request->libelle,
            ]);
        //dd($categorie);
        //return response in json
        return response()->json($categorie);
    }

    /**
     * Remove the specified Categorie from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        // return response in json
        return response()->json($categorie);
    }

}
