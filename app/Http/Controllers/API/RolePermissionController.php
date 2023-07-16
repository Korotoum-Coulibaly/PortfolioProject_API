<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role_permission;
use App\Models\Role;

/**
 * @group Role permission management
 *
 * APIs for managing Role permission
 */

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the permissions associate at role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //associate role with permission
        $permissions_role = Role_permission::all();

        //return response in json
        return response()->json($permissions_role);
    }

    /**
     * Show the form for creating a new permissions associate at role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created permissions associate at role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Insert operation into the database
         $RolePermission = Role_permission::create([
            'role_id' => $request->role_id,
            'permission_id' => $request->permission_id,
   ]);
        //return the response in json
        return response()->json($RolePermission);
    }

    /**
     * Display the specified permissions associate at role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role_permission = Role_permission::findOrFail($id);

        return response()->json($role_permission);

    }

    /**
     * Show the form for editing the specified permissions associate at role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified permissions associate at role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $role_permission = Role_permission::findOrFail($id);
        $role_permission->update([
            'role_id' => $request->role_id,
            'permission_id' => $request->permission_id,
    ]);
        //dd($role_permission);
        //return response in json
        return response()->json($role_permission);
    }

    /**
     * Remove the specified permissions associate at role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_permission = Role_permission::findOrFail($id);
        $role_permission->delete();
        // return response in json
        return response()->json();

    }

     /**
     * Role and permissions information from id of them for all.
     *
     * @return \Illuminate\Http\Response
     */
    public function rolepermissioninformation()
    {
        $permission = Role_permission::with(['permission' => function ($query) {
            $query->inRandomOrder();}
            , 'role'=> function ($query) {
            $query->inRandomOrder();
        }])
        ->whereHas('permission')
        ->get();
        //dd($permission);
        return response()->json($permission);

    }

    /**
     * list of permissions for all role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listofpermissionbyallrole()
    {
        $permissions_roles = Role::with(['role_permission' => function ($query) {
            $query->with('permission');
        }])
        ->get();
        //dd($permissions_roles);
        return response()->json($permissions_roles);

    }

    /**
     *list of permissions for one role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listofpermissionbyonerole($id_role)
    {
        $permissions_role = Role::with(['role_permission' => function ($query) {
            $query->with('permission');
        }])
        ->where('id_role', '=', $id_role)
        ->get();
        //dd($permissions_role);
        return response()->json($permissions_role);

    }
}
