<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller {
    function roleIndex(){
        $roles = Role::with('permissions')->whereNotIn('name', ['super-admin'])->get();
        return view('backend.role.index', compact('roles'));
    }
    function roleCreate(){
        $permissions = Permission::all();
        return view('backend.role.create', compact('permissions'));
    }

    // permission insert
    function permissionInsert(Request $request){
        $request->validate([
            'name' => 'required', 
        ]);

        $role = new Permission();

        $role->name = $request->name;
        $role->save();
        return back()->with('success', 'permission Insert Successfull!');
    }

    // role insert
    function roleInsert(Request $request){
        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        $role = new Role();

        $role->name = $request->name;
        $role->save();

        $role->givePermissionTo($request->permissions);

        return back()->with('success', 'Role Added!');
    }

    public function roleEdit($id){
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permission::all();
        return view('backend.role.edit', compact('role', 'permissions'));
    }

    public function roleUpdate(Request $request, $id){

        $request->validate([
            'name' => 'required',
            'permissions' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);
        return redirect()->route('dashboard.role.index')->with('success', 'Role & Permission Update Successfull!');
    }
}