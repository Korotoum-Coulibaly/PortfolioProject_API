<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

/**
 * @group Permissions management
 *
 * APIs for managing Permissions
 */
class PermissionController extends Controller
{
    /**
     * Display a listing of the Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all permissions
        $permissions = Permission::all();

        //return responses
        return response()->json($permissions);
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Permission in storage.
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
        $permission = Permission::create([
            'libelle' => $request->libelle,
            ]);

        //retourner la reponse en json
        return response()->json($permission);

    }

    /**
     * Display the specified Permission.
     *
     * @param  int  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return response()->json($permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Permission $permission)
    {
        //Modification operation in the database
        //the data must be displayed in the field, and sent along with the modified data
        $permission->update([
            'libelle' => $request->libelle,
    ]);
        //dd($permission);
        //return response in json
        return response()->json($permission);
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        // return response in json
        return response()->json($permission);
    }
}
