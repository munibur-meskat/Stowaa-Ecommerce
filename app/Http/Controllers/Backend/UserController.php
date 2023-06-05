<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id','desc')->get();
        return view('backend.user-role.index', compact('users'));
    }


    public function create()
    {
        $roles =Role::all();
        return view('backend.user-role.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('dashboard.user.index')->with('success', 'User Created Successfull!');
    }

    public function edit(User $user){
        $roles =Role::all();
        return view('backend.user-role.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['nullable', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' .$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ]);

        $user->update([
            'name' => $request->name,
            // 'user_name' => $request->user_name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        if($request->password){
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->syncRoles($request->role);

        return redirect()->route('dashboard.user.index')->with('success', 'User Edit Successfull!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('warning', "User Delete Successfull!");
    }


}
