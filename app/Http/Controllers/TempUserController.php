<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempUser;
use App\Models\User;
use Hash;
use Session;

class TempUserController extends Controller
{
    //Storing the user registration requests.
    function addTempUser(Request $req) {        

        $req->validate([
            'name'=>'required',
            'telNo'=>'required|numeric|digits_between:10,12',
            'email' => 'required|email|unique:temp_users,email|unique:users,email',
            'nic'=>'required|max:12|min:10',
            'password'=>'required|min:6'
        ],[
            'telNo.numeric' => 'The Telephone number must contain only digits.',
            'telNo.digits_between' => 'The Telephone number must not exceed 12 characters.',
            'email.unique' => 'This email is already registered.',
            'nic.max' => 'The national ID number must not exceed 12 characters.',
            'nic.min' => 'The national ID number must have at least 10 characters.',
            'password.min' => 'The Password must include at least 6 characters.'
        ]);

        $TempUser = new TempUser;
        
        $TempUser->name = $req->name;
        $TempUser->age = $req->age;
        $TempUser->telNo = $req->telNo;
        $TempUser->email = $req->email;
        $TempUser->gender = $req->gender;
        $TempUser->nic = $req->nic;        
        $TempUser->role = $req->role;
        // Set SLMC no to null if the role is Patient, otherwise use the request input
        $TempUser->slmcNo = $req->role === "Patient" ? null : $req->slmcNo;
        $TempUser->password = Hash::make($req->password);

        $result = $TempUser->save();

        if($result) {
            return back()->with('success', 'User Regitration Successfull! Await for the credentials.');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your inputs.');
        }
    }
}
