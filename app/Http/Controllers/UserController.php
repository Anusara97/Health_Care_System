<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UserController extends Controller
{
    //
    // view users
    function showUsers() {
        $data = User::all();
        return view('auth/UserList', ['users'=>$data]);
    }
}
