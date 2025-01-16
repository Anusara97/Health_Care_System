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
            'gender'=>'required',
            'nic'=>'required|max:12|min:10|unique:temp_users,nic|unique:users,nic',
            'password'=>'required|min:6'
        ],[
            'telNo.numeric' => 'The Telephone number must contain only digits.',
            'telNo.digits_between' => 'The Telephone number must not exceed 12 characters.',
            'email.unique' => 'This email is already registered.',
            'nic.max' => 'The national ID number must not exceed 12 characters.',
            'nic.min' => 'The national ID number must have at least 10 characters.',
            'nic.unique' => 'This national ID number is already registered.',
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
            return back()->with('success', 'User Regitration request sent! Check your email for more information.');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your inputs.');
        }
    }


    // view temporary users
    function showRequest() {
        $data = TempUser::all();
        return view('auth/TempUserList', ['users'=>$data]);
    }

    //remove unauthorized temporary users
    function rejectRequest($id, Request $req) {
        $data = TempUser::find($id);
        $result = $data->delete();

        if($result) {
            return back()->with('success', 'User Rejected!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your inputs.');
        }
    }

    //Authorizing the temporary users
    public function registerUser($id) {
        $data = TempUser::find($id);
    
        //Add temp user as new user 
        $user = new User();

        $user->name = $data->name;
        $user->age = $data->age;
        $user->telNo = $data->telNo;
        $user->email = $data->email;
        $user->gender = $data->gender;
        $user->nic = $data->nic;
        $user->role = $data->role;
        $user->slmcNo = $data->slmcNo;
        $user->password = $data->password;

        $result = $user->save();
    
        //delete temp user from temporary table after autherisation.
        $data = TempUser::find($id);
        $data->delete();
    
        //check if the result is successfull or not
        if($result) {
            return back()->with('success', 'User Regitration Successfull!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your inputs.');
        }
    }
}
