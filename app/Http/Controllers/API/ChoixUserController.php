<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choice_user;

/**
 * @group Users choice management
 *
 * APIs for managing users choice
 */
class ChoixUserController extends Controller
{
    /**
     * Display a listing of the Users choice.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Associate choice with users
        $users_choice = Choice_user::all();

        //return response in Json
        return response()->json($users_choice);
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
     * Store a newly created Users choice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                 //Insert operation into the database
                 $ChoiceUser = Choice_user::create([
                    'user_id' => $request->user_id,
                    'quote_numero' => $request->quote_numero,
                    'pack_id' => $request->pack_id,
                    'quantity' => $request->quantity,
                    'total_price' => $request->total_price,
                    'price_with_discount' => $request->price_with_discount,
           ]);

                //return the response in json
                return response()->json($ChoiceUser);
    }

    /**
     * Display the specified Users choice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $choice_user = Choice_user::findOrFail($id);

        return response()->json($choice_user);
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
     * Update the specified Users choice in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $choice_user = Choice_user::findOrFail($id);

        $choice_user->update([
            'user_id' => $request->user_id,
            'quote_id' => $request->quote_id,
            'quote_numero' => $request->quote_numero,
            'pack_id' => $request->pack_id,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
            'price_with_discount' => $request->price_with_discount,
       ]);
        //dd($choice_user);
        //return response in json
        return response()->json($choice_user);
    }

    /**
     * Remove the specified Users choice from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $choice_user = Choice_user::findOrFail($id);
        $choice_user->delete();
        // return response in json
        return response()->json($choice_user);

    }

     /**
     * List user product and pack information from id of them for all.
     *
     * @return \Illuminate\Http\Response
     */
    public function userproductpackinformation()
    {
        $UPPinformation = Choice_user::with(['user' => function ($query) {
            $query->inRandomOrder();}
            , 'product'=> function ($query) {
            $query->inRandomOrder();}
            ,'pack'=> function ($query) {
                $query->with('pack_product');

        }])
        ->get();
        //dd($UPPinformation);
        return response()->json($UPPinformation);

    }

     /**
     * List user product and pack information from id of them for one.
     *
     * @param  int  $id_user_choice
     * @return \Illuminate\Http\Response
     */
    public function userproductpackinformationofonechoice($id_user_choice)
    {
        $UPPinformation = Choice_user::with(['user' => function ($query) {
            $query->inRandomOrder();}
            , 'product'=> function ($query) {
            $query->inRandomOrder();}
            ,'pack'=> function ($query) {
                $query->with('pack_product');

        }])
        ->where('id_choice_user', '=', $id_user_choice)
        ->get();
        //dd($UPPinformation);
        return response()->json($UPPinformation);

    }
}
