<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UserController extends Controller
{
    // view users
    function showUsers() {
        $data = User::all();
        return view('auth/UserList', ['users'=>$data]);
    }

    // delete user
    function removeRequest($id, Request $req) {
        $data = User::find($id);
        $result = $data->delete();

        if($result) {
            return back()->with('success', 'User Rejected!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your inputs.');
        }
    }
}
