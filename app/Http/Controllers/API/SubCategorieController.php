<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sub_categorie;
use App\Models\Pack;
use App\Models\Categorie;

/**
 * @group Sub-Categorie management
 *
 * APIs for managing Sub-Categorie
 */

class SubCategorieController extends Controller
{
    /**
     * Display a listing of the Sub-Categorie.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all sub Categorie
        $sub_categories = Sub_categorie::with(['category' => function ($query) {
            $query->inRandomOrder();

        }])
        ->whereHas('category')
        ->get();

        //return response in json
        return response()->json($sub_categories);
    }

    /**
     * Show the form for creating a new Sub-Categorie.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Sub-Categorie in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //verification des paramètres entré, s'assurer que le password est de la forme test@123password
         $request->validate([
            'libelle' => ['required', 'string', 'max:255'],
            'categorie_id' => ['required', 'integer'],
        ]);

        //Opération d'insertion dans la base de donnée
        $sub_categorie = Sub_categorie::create([
            'libelle' => $request->libelle,
            'categorie_id' => $request->categorie_id,
            ]);

        //retourner la reponse en json
        return response()->json($sub_categorie);

    }

    /**
     * Display the specified Sub-Categorie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $sub_categorie =  Sub_categorie::with(['category' => function ($query) {
            $query->inRandomOrder();
        }])
        ->where('id_sub_categorie', '=' , $id)
        ->whereHas('category')
        ->get();

        return response()->json($sub_categorie);

    }

    /**
     * Show the form for editing the specified Sub-Categorie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Sub-Categorie in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_sub_categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $sub_categorie = Sub_categorie::findOrFail($id);
        //Modification operation in the database
        //the data must be displayed in the field, and sent along with the modified data
        $sub_categorie->update([
            'libelle' => $request->libelle,
            'categorie_id' => $request->categorie_id,
        ]);
        //dd($sub_categorie);
        //return response in json
        return response()->json($sub_categorie);
    }

    /**
     * Remove the specified Sub-Categorie from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_categorie = Sub_categorie::findOrFail($id);
        $sub_categorie->delete();
        // return response in json
        return response()->json($sub_categorie);
    }

    /**
     * Show all Sub-Categorie for all categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function Showallsubcategorieofcategorie()
    {
        $categorie = Categorie::with(['categorie' => function ($query) {
            $query->inRandomOrder();

        }])
        ->whereHas('categorie')
        ->get();
        //dd($categorie);
        return response()->json($categorie);

    }

    /**
     * Show Sub-Categorie for one categorie from storage.
     *
     * @param  int  $id_categorie
     * @return \Illuminate\Http\Response
     */
    public function Showsubcategorieofcategorie($id_categorie)
    {
        $categorie = Categorie::with(['categorie' => function ($query) {
            $query->inRandomOrder();

        }])
        ->whereHas('categorie')
        ->where('id_categorie','=', $id_categorie)
        ->get();
        //dd($categorie);
        return response()->json($categorie);

    }


}
