<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\PatientRecord;
use App\Models\PendingJob;
use Session;

class PatientRecordController extends Controller
{
    //view pending jobs
    function viewJobsJNR()
    {
        // Check if the user is logged in
        if (!Session::has('loginId')) {
            return redirect('/login')->with('fail', 'Access Denied! You have to log in first!');
        }

        // Fetch the logged-in user's details
        $userId = Session::get('loginId');
        $pharmacist = User::find($userId);

        // Allow only Junior or Senior Pharmacists
        if (!in_array($pharmacist->role, ['Junior Pharmacist', 'Senior Pharmacist'])) {
            return redirect('/dashboard')->with('fail', 'Only pharmacists can perform this operation.');
        }

        // Fetch all pending jobs
        $data = PatientRecord::all();

        // Render the page with the data
        return view('treatments/pendingJobJNR', compact('data'));
    }

}
