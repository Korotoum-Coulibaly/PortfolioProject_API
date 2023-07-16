<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role_user;
use App\Models\User;

/**
 * @group User Role management
 *
 * APIs for managing User Role
 */
class RoleUserController extends Controller
{
    /**
     * Display a listing of the role associate with user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //users and role association
        $user_roles = Role_user::all();

        //we return the data in Json format
        return response()->json($user_roles);
    }

    /**
     * Show the form for creating a new role associate with user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created role associate with user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //Insert operation into the database
                $UserRole = Role_user::create([
                    'user_id' => $request->user_id,
                    'role_id' => $request->role_id,

           ]);

                //return the response in json
                return response()->json($UserRole);
    }

    /**
     * Display the specified role associate with user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role_user = Role_user::findOrFail($id);
        return response()->json($role_user);

    }

    /**
     * Show the form for editing the specified role associate with user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified role associate with user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $role_user = Role_user::findOrFail($id);
        $role_user->update([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
      ]);
        // dd($role_user);
        //return response in json
        return response()->json($role_user);
    }

    /**
     * Remove the specified role associate with user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_user = Role_user::findOrFail($id);
        $role_user->delete();
        // return response in json
        return response()->json($role_user);

    }

    /**
     * Role and User information associate with user from id of them.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleuserinformation()
    {
        $permission = Role_user::with(['user' => function ($query) {
            $query->inRandomOrder();}
            , 'role'=> function ($query) {
            $query->inRandomOrder();
            ;
        }])
        ->get();
        //dd($permission);
        return response()->json($permission);

    }

    /**
     * List of roles for all user
     *
     * @return \Illuminate\Http\Response
     */
    public function listofrolesbyalluser()
    {
        $users_roles = User::with(['user_role' => function ($query) {
            $query->with('role');
        }])
        ->get();
        //dd($users_roles);
        return response()->json($users_roles);
    }

    /**
     * List of roles for one user
     *
     * @param  int  $id_userRole
     * @return \Illuminate\Http\Response
     */
    public function listofrolesbyoneuser($id_user)
    {
        $user_roles = User::with(['user_role' => function ($query) {
            $query->with('role');
        }])
        ->whereHas('user_role')
        ->where('id_user', '=', $id_user)
        ->get();
        //dd($user_roles);
        return response()->json($user_roles);

    }
}
