<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_metas = UserMeta::with(['user:id,name'])->select('description','address','profile_photo');
        return view('backend.user-profile.index', compact('user_metas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    public function show(UserMeta $userMeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    // UserMeta $userMeta
    public function edit(UserMeta $userMeta)
    {
        // $id = Auth::user()->user_metas->id;
         
        // $users = User::with('user_metas')->get(['id','name','email']);
     
       return view('backend.user-profile.edit',compact('userMeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    public function update(UserMeta $userMeta, Request $request, $id)
    {
        $profile_image = $request->profile_photo;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['nullable', 'string', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' .$userMeta->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if($profile_image){
            $image_name = Str::lower($request->name . time().".". $profile_image->getClientOriginalExtension());
        }
         
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $profile_photo = $request->file('profile_photo');
        $user_metas = UserMeta::where('user_id')->get('profile_photo');

      
        foreach($user_metas as $user_meta){
            $image_name  = $user_meta->profile_photo;  
    
            }

            if($profile_image){
                $profile_image->move(public_path('/storage/profile-upload'), $profile_photo);
            }
        $userMeta->update([
            'name' => $request->name,
            'description' => $request->description,
            'address'=> $request->address,
            'profile_photo'=> $request->profile_photo,
        ]);

        if($request->password){
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }


        // return redirect()->route('dashboard.role-assign.index ');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserMeta  $userMeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMeta $userMeta)
    {
        //
    }
}
