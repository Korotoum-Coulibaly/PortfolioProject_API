<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use Carbon\Carbon;

/**
 * @group Quote management
 *
 * APIs for managing Quote
 */
class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all quote
        $quotes = Quote::all();
        return response()->json($quotes);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verification des paramètres entré, s'assurer que le password est de la forme test@123password
        $request->validate([
            'user_id' => ['required', 'integer'],
            'prospect_id' => ['required', 'integer'],
            'office_id' => ['required', 'integer'],
            'all_price' => ['required', 'integer'],

        ]);
        $dateActuelle = Carbon::now();
        //dd($dateActuelle);
        $date_expiration = $dateActuelle->addDays(30);

        //Opération d'insertion dans la base de donnée
        $quote = Quote::create([
            'user_id' => $request->user_id,
            'all_price' => $request->all_price,
            'date_expiration' => $date_expiration,
            //corriger l'aspect date, date_expiration = date_emission + 30 jours avec Carbon
            'prospect_id' => $request->prospect_id,
            'office_id' => $request->office_id,
            'quote_numero' => $request->quote_numero,


            ]);
        //la copie du devis n'est pas encore géré
        //retourner la reponse en json
        return response()->json($quote);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        $quotedependuser = Quote::with(['user' => function ($query) {
            $query->inRandomOrder();}
            , 'prospect'=> function ($query) {
            $query->inRandomOrder();}
            ,'office'=> function ($query) {
                $query->inRandomOrder();}
            ,'choice'=> function ($query) {
                $query->inRandomOrder();
                $query->with('packdepuisquote');
                $query->with('productdepuisquote');


        }])
        ->where('user_id', '=', $id_user)
        ->get();
        //dd($UPOinformation);
        return response()->json($quotedependuser);

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Quote $quote)
    {
        //Modification operation in the database
        //the data must be displayed in the field, and sent along with the modified data
        $quote->update([
            'user_id' => $request->user_id,
            'all_price' => $request->all_price,
            'date_expiration' => $request->date_expiration,
            //corriger l'aspect date, date_expiration = date_emission + 30 jours avec Carbon
            'prospect_id' => $request->prospect_id,
            'office_id' => $request->office_id,
            'quote_numero' => $request->quote_numero,

        ]);
        //dd($quote);
        //return response in json
        return response()->json($quote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        // return response in json
        return response()->json($quote);
    }
    public function userprospectofficeinformation()
    {
        $UPOinformation = Quote::with(['user' => function ($query) {
            $query->inRandomOrder();}
            , 'prospect'=> function ($query) {
            $query->inRandomOrder();}
            ,'office'=> function ($query) {
                $query->inRandomOrder();}
            ,'choice'=> function ($query) {
                $query->inRandomOrder();
                $query->with('packdepuisquote');
                $query->with('productdepuisquote');

        }])
        ->get();
        //dd($UPOinformation);
        return response()->json($UPOinformation);


    }
    public function userprospectofficeinformationforone($quote_numero)
    {
        $UPOinformation = Quote::with(['user' => function ($query) {
            $query->inRandomOrder();}
            , 'prospect'=> function ($query) {
            $query->inRandomOrder();}
            ,'office'=> function ($query) {
                $query->inRandomOrder();}
            ,'choice'=> function ($query) {
                $query->inRandomOrder();
                $query->with('packdepuisquote');
                $query->with('productdepuisquote');


        }])
        ->where('quote_numero', '=', $quote_numero)
        ->get();
        //dd($UPOinformation);
        return response()->json($UPOinformation);

    }
}
