<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use Session;

class AppointmentController extends Controller
{
    //
    function showMakeAppointmentForm()
    {
        // Check if the user is logged in
        if (!Session::has('loginId')) {
            return redirect('/login')->with('fail', 'Access Denied! You have to log in first!');
        }

        // Fetch logged-in user's details
        $userId = Session::get('loginId');
        $patient = User::find($userId);

        if ($patient->role !== 'Patient') {
            return redirect('/dashboard')->with('fail', 'Only patients can make appointments.');
        }

        // Generate the next appointment number for today
        $today = now()->toDateString();
        $latestAppointment = Appointment::where('date', $today)->orderBy('appNo', 'desc')->first();
        $nextAppointmentNo = $latestAppointment ? $latestAppointment->appNo + 1 : 1;

        // Pass data to the view
        return view('appointments/makeApp', [
            'patient' => $patient,
            'appointmentNo' => $nextAppointmentNo,
            'date' => $today
        ]);
    }

    function setAppointment(Request $req) {
        $req->validate([
            'disease'=>'required'
        ]);

        $Appointment = new Appointment;

        $Appointment->name = $req->name;
        $Appointment->age = $req->age;
        $Appointment->gender = $req->gender;
        $Appointment->date = $req->date;
        $Appointment->appNo = $req->appNo;
        $Appointment->disease = $req->disease;

        $result = $Appointment->save();

        if($result) {
            return redirect('/dashboard')->with('success', 'Your Appointment is successfully created!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check your appointment details.');
        }        
    }

    // view appointment list
    function showAppointments() {
        $data = Appointment::all();
        return view('appointments/appList', ['appointments'=>$data]);
    }
}
