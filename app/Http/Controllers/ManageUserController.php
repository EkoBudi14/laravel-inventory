<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ManageUserController extends Controller
{
    public function allUsers() {
        $users = User::all();
        return view('Admin.all_users', compact('users'));
    }



    public function addUsers() {
        return view('Admin.add_users');
    }

    public function editUsers($id) {
        $users = User::findOrFail($id);
        return view('Admin.edit_users', compact('users'));
    }

    public function store(Request $request){
        $insert = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if($insert){
            Alert::success('Succes','Succefully add new user');
        }

        return redirect()->route('all.users');
    }

    public function update(Request $request, $id)
    {
        $user = $request->all();
        $users = User::findOrFail($id);
        $users->update($user);
        return redirect()->route('all.users')->with('success', 'User Was Successfully Edited');
        
    } 

    public function destroy($id) 
    {   
        $users = User::find($id);
        $users->delete();
        return redirect()->route('all.users')->withSuccess('User Was Deleted');
    }


}
