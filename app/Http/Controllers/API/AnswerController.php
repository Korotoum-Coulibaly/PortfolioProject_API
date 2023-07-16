<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;

/**
 * @group Answers management
 *
 * APIs for managing Answers
 * All questions have many answer possible
 * In example true or false
 */
class AnswerController extends Controller
{
    /**
     * Display a listing of Answers possible
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all user answers are retrieved
        $answers = Answer::all();

        //we return the data in Json format
        return response()->json($answers);

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
     * Store a newly created Answer in storage.
     *
     * @queryParam answer string Insert answer
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    ;

        //Opération d'insertion dans la base de donnée
        $answer = Answer::create([
            'answer' => $request->answer,
            ]);

        //retourner la reponse en json
        return response()->json($answer);
    }

    /**
     * Display the specified Answer.
     *
     * @param  int  $id_answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return response()->json($answer);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Answer in storage.
     * Enter all previous data and change information that needs to be change
     *
     * @queryParam answer string Insert answer
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Answer $answer)
    {
        $answer->update([
            'answer' => $request->answer,
            ]);
        //dd($answer);
        //return response in json
        return response()->json($answer);
    }

    /**
     * Remove the specified Answer from storage.
     *
     * @param  int  $id_answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        // return response in json
        return response()->json($answer);
    }
}
