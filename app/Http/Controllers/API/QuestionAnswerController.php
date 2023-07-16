<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question_answer;
use App\Models\Question;

/**
 * @group Questions responses management
 *
 * APIs for managing Questions
 */
class QuestionAnswerController extends Controller
{
    /**
     * Display a listing of the response associate with questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //associate pack with product
         $question_answers = Question_answer::all();

         //return response in json
         return response()->json($question_answers);

    }

    /**
     * Show the form for creating a new response associate with questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created the responses associate with questions in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Insert operation into the database
         $question_answers = Question_answer::create([
            'question_id' => $request->question_id,
            'answer_id' => $request->answer_id,
   ]);
        //return the response in json
        return response()->json($question_answers);
    }

    /**
     * Display the specified response associate with questions.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question_answers = Question_answer::findOrFail($id);

        return response()->json($question_answers);
    }

    /**
     * Show the form for editing specified the response associate with questions.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified response associate with questions in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question_answers = Question_answer::findOrFail($id);

        $question_answers->update([
            'question_id' => $request->question_id,
            'answer_id' => $request->answer_id,
    ]);
        //dd($question_answers);
        //return response in json
        return response()->json( $question_answers);
    }

    /**
     * Remove the specified response associate with questions from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question_answers = Question_answer::findOrFail($id);
        $question_answers->delete();
        // return response in json
        return response()->json($question_answers);
    }

     /**
     * list of all response associate at all questions from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function listeofanswerbyquestion()
    {
        $question_answers = Question::with(['question_answer' => function ($query) {
            $query->with('answer');
        }])
        ->get();
        //dd($question_answers);
        return response()->json($question_answers);

    }

     /**
     * list of responses associate at one  question from storage.
     *
     * @param  int  $id_question
     * @return \Illuminate\Http\Response
     */
    public function listeofanswerforonequestion($id_question)
    {
        $question_answers = Question::with(['question_answer' => function ($query) {
            $query->with('answer');
        }])
        ->where('id_question', '=', $id_question)
        ->get();
        //dd($question_answers);
        return response()->json($question_answers);

    }
}
