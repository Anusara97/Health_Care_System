<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\PatientRecord;
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
        // Check if the user is logged in
        if (!Session::has('loginId')) {
            return redirect('/login')->with('fail', 'Access Denied! You have to log in first!');
        }
    
        // Fetch logged-in user's details
        $userId = Session::get('loginId');
        $user = User::find($userId);
    
        // Check if the user is an admin or doctor
        if ($user->role !== 'Admin' && $user->role !== 'Doctor') {
            return redirect('/dashboard')->with('fail', 'Access Denied! Only Admins and Doctors can access this page.');
        }
    
        // Fetch all appointments and pass them to the view
        $data = Appointment::all();
        return view('appointments/appList', ['appointments' => $data]);
    }

    //make prescription
    public function showPrescriptionForm($id)
    {
        // Check if the user is logged in
        if (!Session::has('loginId')) {
            return redirect('/login')->with('fail', 'Access Denied! You have to log in first!');
        }

        // Fetch logged-in user's details
        $userId = Session::get('loginId');
        $doctor = User::find($userId);

        // Check if the user is a doctor
        if ($doctor->role !== 'Doctor') {
            return redirect('/dashboard')->with('fail', 'Access Denied! Only Doctors can prescribe medications.');
        }

        // Retrieve the appointment details
        $appointment = Appointment::where('id', $id)->first();

        if (!$appointment) {
            return redirect('appointments/appList')->with('fail', 'Appointment not found.');
        }

        // Pass data to the view
        return view('treatments/prescription', [
            'appId' => $appointment->id,
            'name' => $appointment->name,
            'age' => $appointment->age,
            'gender' => $appointment->gender,
            'appNo' => $appointment->appNo,
            'date' => $appointment->date,
            'disease' => $appointment->disease,
            'dName' => $doctor->name,
        ]);
    }

    //Store patient treatment data
    public function savePrescription(Request $req)
    {
        $req->validate([
            'drugName' => 'required|string',
            'dosage' => 'required|string',            
        ]);

        // Save prescription data in PatientRecords table
        $record = new PatientRecord();

        $record->name = $req->name;
        $record->age = $req->age;
        $record->gender = $req->gender;
        $record->appNo = $req->appNo;
        $record->date = $req->date;
        $record->disease = $req->disease;
        $record->drugName = $req->drugName;
        $record->dosage = $req->dosage;
        $record->patientStatus = $req->patientStatus;
        $record->substitutionStatus = $req->substitutionStatus;
        $record->dName = $req->dName;

        $result = $record->save();

        $data = Appointment::find($req->appId);
        $data->delete();

        if ($result) {
            return redirect('/appList')->with('success', 'Prescription has been successfully saved.');
        } else {
            return back()->with('fail', 'Failed to save prescription. Please try again.');
        }
    }
}
