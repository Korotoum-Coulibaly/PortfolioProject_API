<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;

/**
 * @group Office management
 *
 * APIs for managing Office
 */
class OfficeController extends Controller
{
    /**
     * Display a listing of the Office.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all Office
        $offices = Office::all();

        //return respone in json
        return response()->json($offices);
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
     * Store a newly created Office in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verification des paramètres entré, s'assurer que le password est de la forme test@123password
        $request->validate([
            'office_name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'subject_quotation_form' => ['required', 'string', 'max:255'],
            'remark_subject_quotation' => ['required', 'string', 'max:500'],

        ]);
        //verifier si un siège est déjà enregistré
        if (!Office::canInsert()) {
            // Si la condition n'est pas satisfaite, retournez une réponse d'erreur ou redirigez l'utilisateur
            return response()->json(['error' => 'Un seul enregistrement est autorisé.'], 422);
        }

        //Opération d'insertion dans la base de donnée
        $office = Office::create([
            'office_name' => $request->office_name,
            'location' => $request->location,
            'subject_quotation_form' => $request->subject_quotation_form,
            'remark_subject_quotation' => $request->remark_subject_quotation,
            ]);

        //retourner la reponse en json
        return response()->json($office);

    }

    /**
     * Display the specified Office.
     *
     * @param  int  $id_office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return response()->json($office);

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
     * Update the specified Office in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Office $office)
    {
        $office->update([
            'office_name' => $request->office_name,
            'location' => $request->location,
            'subject_quotation_form' => $request->subject_quotation_form,
            'remark_subject_quotation' => $request->remark_subject_quotation,
       ]);
        //dd($office);
        //return response in json
        return response()->json($office);

    }

    /**
     * Remove the specified Office from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->delete();
        // return response in json
        return response()->json($office);
    }
}
