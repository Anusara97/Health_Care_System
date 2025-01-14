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
    function removeUser($id, Request $req) {
        $data = User::find($id);
        $result = $data->delete();

        if($result) {
            return back()->with('success', 'User Rejected!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your inputs.');
        }
    }

    //This function used to view user details before edit
    function editUser($id) {
        $data = User::find($id);
        return view('auth/UserEdit', compact('data'));
    }

    // edit user
    function updateUser(Request $req) {
        $req->validate([
            'name'=>'required',
            'telNo'=>'required|numeric|digits_between:10,12',
            'email' => 'required|email',
            'gender'=>'required',
            'nic'=>'required|max:12|min:10',
            'password'=>'required|min:6'
        ],[
            'telNo.numeric' => 'The Telephone number must contain only digits.',
            'telNo.digits_between' => 'The Telephone number must not exceed 12 characters.',            
            'nic.max' => 'The national ID number must not exceed 12 characters.',
            'nic.min' => 'The national ID number must have at least 10 characters.',            
            'password.min' => 'The Password must include at least 6 characters.'
        ]);

        $User = User::find($req->id);
        
        $User->name = $req->name;
        $User->age = $req->age;
        $User->telNo = $req->telNo;
        $User->email = $req->email;
        $User->gender = $req->gender;
        $User->nic = $req->nic;        
        $User->role = $req->role;
        // Set SLMC no to null if the role is Patient, otherwise use the request input
        $User->slmcNo = $req->role === "Patient" ? null : $req->slmcNo;
        $User->password = Hash::make($req->password);

        $result = $User->save();

        if($result) {
            return redirect('userList')->with('success', 'Successfully updated the user details!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check again.');
        }
    }

    //This function is used by admin to add user directly.
    function addUser(Request $req) {
        $req->validate([
            'name'=>'required',
            'email'=>'required|email|unique:temp_users',
            'designation'=>'required',
            'password'=>'required'
        ]);

        $User = new User;
        
        $User->name = $req->name;
        $User->email = $req->email;
        $User->designation = $req->designation;
        $User->staffId = $req->staffId ?: null;
        // Set department to null if the designation is Student, otherwise use the request input
        $User->department = $req->designation === "Student" ? null : $req->department;
        $User->studentId = $req->studentId ?: null;
        $User->password = Hash::make($req->password);
        // Set the role
        $User->role = $req->designation === "Student" ? "Student" : "Staff";
        $result = $User->save();

        if($result) {
            return back()->with('success', 'User Regitration Successfull!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your inputs.');
        }
    }
}
