<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index() 
    {   
        $data = User::paginate(10);
        $role = Role::all();
        foreach ($data as $item) { 
            $item->role = Role::find($item->roles_id);  
        } 

        return view('user.index', compact('data', 'role'));
    } 
    public function create() 
    { 
        $data['role'] = Role::get(); 
        return view('user.create', $data); 
    } 
    
    public function store(Request $request) 
    { 
        $user = new User;

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();

            $filename = 'photo_user_'.time().'.'.$extension;

            $request->file('photo')->storeAs(
                'public/photo_user', $filename
            );

            $user->photo = $filename;
        }

        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->roles_id = $request->get('roles_id');
        
        $user->save();

        return redirect()->route("user.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
    public function show($kela) 
    { 
    // 
    } 
    
    public function edit($user) 
    {     
        $data = User::findOrFail($user);
        $data['role'] = Role::get();  
            return view('user.edit', $data); 
        } 
    public function update(Request $request, $user) 
    { 
        $user = User::findOrFail($user); 
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();

            $filename = 'photo_user_'.time().'.'.$extension;

            $request->file('photo')->storeAs(
                'public/photo_user', $filename
            );

            Storage::delete('public/photo_user/'.$request->get('old_photo'));

            $user->photo = $filename;
        }
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->roles_id = $request->get('roles_id');

        

        $user->save();
        return redirect()->route("user.index")->with( 
            "success", 
            "Data berhasil diubah." 
        ); 
    } 
    
    public function destroy($kela) 
    { 
        $data = User::findOrFail($kela); 
        $data->delete(); 
    } 
}
