<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_answer;

/**
 * @group User Answer management
 *
 * APIs for managing user Answer
 */
class UserAnswerController extends Controller
{
    /**
     * Display a listing of the answers selected by the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //users and answers association
        $user_answers = User_answer::all();

        //we return the data in Json format
        return response()->json($user_answers);
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
     * Store a newly created answers selected by the user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Insert operation into the database
        $UserAnswer = User_answer::create([
            'user_id' => $request->user_id,
            'answer_id' => $request->answer_id,
            'quote_id' => $request->quote_id,

   ]);

        //return the response in json
        return response()->json($UserAnswer);
    }

    /**
     * Display the specified answer selected by the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_answer = User_answer::findOrFail($id);

        return response()->json($user_answer);

    }

    /**
     * Show the form for editing the specified answer selected by the user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified answer selected by the user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user_answer = User_answer::findOrFail($id);

        $user_answer->update([
            'user_id' => $request->user_id,
            'answer_id' => $request->answer_id,
            'quote_id' => $request->quote_id,
    ]);
        //dd($user_answer);
        //return response in json
        return response()->json($user_answer);
    }

    /**
     * Remove the specified answer selected by the user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_answer = User_answer::findOrFail($id);

        $user_answer->delete();
        // return response in json
        return response()->json($user_answer);

    }

     /**
     * user and answer selected information from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function useranswerquoteinformation()
    {
        $UAQinformation = User_answer::with(['user' => function ($query) {
            $query->inRandomOrder();}
            , 'quote'=> function ($query) {
            $query->inRandomOrder();}
            ,'answer'=> function ($query) {
                $query->inRandomOrder();

        }])
        ->get();
        //dd($UAQinformation);
        return response()->json($UAQinformation);

    }
}
