<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

/**
 * @group Questions management
 *
 * APIs for managing Quote
 */
class QuestionController extends Controller
{
    /**
     * Display a listing of the Quote.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all question
        $questions = Question::all();

        //return response in json
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new Quote.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Quote in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //verification des paramètres entré, s'assurer que le password est de la forme test@123password
         $request->validate([
            'libelle' => ['required', 'string', 'max:255'],
            'pack_id' => ['required', 'integer'],
        ]);

        //Opération d'insertion dans la base de donnée
        $question = Question::create([
            'libelle' => $request->libelle,
            'pack_id' => $request->pack_id,
            ]);

        //retourner la reponse en json
        return response()->json($question);

    }

    /**
     * Display the specified Quote.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return response()->json($question);

    }

    /**
     * Show the form for editing the specified Quote.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Quote in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question)
    {
        $question->update([
            'libelle' => $request->libelle,
            'pack_id' => $request->pack_id,
             ]);
        //dd($question);
        //return response in json
        return response()->json($question);
    }

    /**
     * Remove the specified Quote from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        // return response in json
        return response()->json($question);
    }

}
