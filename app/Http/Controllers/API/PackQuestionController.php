<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pack_question;

/**
 * @group Questions for each pack management
 *
 * APIs for managing users Questions for each pack
 */
class PackQuestionController extends Controller
{
    /**
     * Display a listing of the Question associate with pack.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //associate pack with product
         $pack_questions = Pack_question::all();

         //return response in json
         return response()->json($pack_questions);

    }

    /**
     * Show the form for creating a new Question associate with pack.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Question associate with pack in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Insert operation into the database
         $Packquestions = Pack_question::create([
            'pack_id' => $request->pack_id,
            'question_id' => $request->question_id,
   ]);

        //return the response in json
        return response()->json($Packquestions);
    }

    /**
     * Display the specified Question associate with pack.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Pack_questions = Pack_question::findOrFail($id);

        return response()->json($Pack_questions);
    }

    /**
     * Show the form for editing the specified  Question associate with pack.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified  Question associate with pack in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Packquestions = Pack_question::findOrFail($id);

        $Packquestions->update([
            'pack_id' => $request->pack_id,
            'question_id' => $request->question_id,
    ]);
        //dd($Packquestions);
        //return response in json
        return response()->json($Packquestions);
    }

    /**
     * Remove the specified Question associate with pack from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Packquestions = Pack_question::findOrFail($id);
        $Packquestions->delete();
        // return response in json
        return response()->json($Packquestions);
    }
}
