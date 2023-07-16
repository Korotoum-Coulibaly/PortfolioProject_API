<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

/**
 * @group Users management
 *
 * APIs for managing Users
 */
class UserController extends Controller
{
    /**
     * Display a listing of user
     *
     * @name : user name
     * @return \Illuminate\Http\Response
     * @unauthenticated
     */
    public function index()
    {
        //All user are retrieved
        $users = User::all();

        //we return the data in Json format
        return response()->json($users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created User in storage.
     *
     * @queryParam name string Insert name. Example: Coulby
     * @queryParam sexe string Insert sexe. Example: F
     * @queryParam email string Insert email.Example: coulby@gmail.com
     * @queryParam function string Insert function. Example: Informaticienne
     * @queryParam password string Insert password. Example: coulbyT52@
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //Insert operation into the database
        $user = User::create([
            'name' => $request->name,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'function' => $request ->function,
            'password' => Hash::make($request->password),
        ]);

        //Direct connection operation, no need to reconnect
        event(new Registered($user));
        Auth::login($user);

        //return the response in json
        return response()->json($user);

    }

    /**
     * Display the specified User.
     *
     * Select information for one user from your id
     * @param  int  $id_user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int  $id_user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified User in storage.
     * Enter all previous data and change information that needs to be change
     *
     * @queryParam name string Insert name. Example: Coulby
     * @queryParam sexe string Insert sexe. Example: F
     * @queryParam email string Insert email.Example: coulby@gmail.com
     * @queryParam function string Insert function. Example: Informaticienne
     * @queryParam password string Insert password. Example: coulbyT52@
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Modification operation in the database
        //the data must be displayed in the field, and sent along with the modified data
        $user->update([
            'name' => $request->name,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'function' => $request->function,
            'password' => Hash::make($request->password),
        ]);
        //dd($user);
        //return response in json
        return response()->json($user);
    }

    /**
     * Remove the specified User from storage.
     *
     * Delete information for one user from your id
     * @param  int  $id_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        // return response in json
        return response()->json();
    }
}
