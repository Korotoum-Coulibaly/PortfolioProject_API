<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prospect;

/**
 * @group Prospect management
 *
 * APIs for managing Prospect
 */
class ProspectController extends Controller
{
    /**
     * Display a listing of the Prospect.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all prospects
        $prospects =Prospect::all();

        //return response in json
        return response()->json($prospects);
    }

    /**
     * Show the form for creating a new Prospect.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Prospect in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verification des paramètres entré, s'assurer que le password est de la forme test@123password
        $request->validate([
            'name_prospect' => ['required', 'string', 'max:255'],
            'firstName_prospect' => ['required', 'string', 'max:255'],
            'sexe' => ['required', 'string', 'max:255'],
            'allied_enterprise' => ['required', 'string', 'max:255'],
        ]);

        //Opération d'insertion dans la base de donnée
        $prospect = Prospect::create([
            'name_prospect' => $request->name_prospect,
            'firstName_prospect' => $request->firstName_prospect,
            'sexe' => $request->sexe,
            'allied_enterprise' => $request->allied_enterprise,
            'email' => $request->email,
            'id_prospect',
            ]);

        //retourner la reponse en json
        return response()->json($prospect);

    }

    /**
     * Display the specified Prospect.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prospect $prospect)
    {
        return response()->json($prospect);

    }

    /**
     * Show the form for editing the specified Prospect.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Prospect in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Prospect $prospect)
    {
                //Modification operation in the database
        //the data must be displayed in the field, and sent along with the modified data
        $prospect->update([
            'name_prospect' => $request->name_prospect,
            'firstName_prospect' => $request->firstName_prospect,
            'sexe' => $request->sexe,
            'allied_enterprise' => $request->allied_enterprise,
            'email' => $request->email,
            'id_prospect',
            ]);
        //dd($prospect);
        //return response in json
        return response()->json($prospect);
    }

    /**
     * Remove the specified Prospect from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        $prospect->delete();
        // return response in json
        return response()->json($prospect);
    }
}
