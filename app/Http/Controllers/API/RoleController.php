<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

/**
 * @group Role management
 *
 * APIs for managing Role
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all role
        $roles = Role::all();

        //return response in json
        return response()->json($roles);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verification des paramètres entré, s'assurer que le password est de la forme test@123password
        $request->validate([
            'libelle' => ['required', 'string', 'max:255'],
        ]);

        //Opération d'insertion dans la base de donnée
        $role = Role::create([
            'libelle' => $request->libelle,
            ]);

        //retourner la reponse en json
        return response()->json($role);

    }

    /**
     * Display the specified Role.
     *
     * @param  int  $id_role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return response()->json($role);

    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int  $id_role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Role $role)
    {
         //Modification operation in the database
        //the data must be displayed in the field, and sent along with the modified data
        $role->update([
            'libelle' => $request->libelle,
        ]);
        //dd($role);
        //return response in json
        return response()->json($role);
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int  $id_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        // return response in json
        return response()->json($role);
    }
}
