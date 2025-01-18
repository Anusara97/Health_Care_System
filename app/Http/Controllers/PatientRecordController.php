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
    // ===========Junior Pharmacist Functionalities===========

    //view pending jobs for 
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
        $data = PendingJob::all();

        // Render the page with the data
        return view('treatments/pendingJobJNR', compact('data'));
    }

    //prepare medicine by junior pharmacists
    function prepareMedicine($id)
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
        
        // Fetch the patient record details using the ID
        $patientRecord = PatientRecord::find($id);

        if (!$patientRecord) {
            // If no record is found, redirect with an error message
            return redirect()->route('pendingJob')->with('fail', 'Record not found.');
        }

        // Pass the record and the current user to the view
        return view('treatments/checkJobJNR', [
            'job' => $patientRecord,
            'currentUser' => $pharmacist, // Pass the pharmacist details
        ]);
    }

    function savePreparation(Request $req){        
        $patientRecord = PatientRecord::where('id', $req->appId)->first();
        $pendingJob = PendingJob::where('id', $req->appId)->first();

        $pendingJob->preparedBy = $req->preparedBy;
        $pendingJob->pRole = $req->pRole;
        $pendingJob->dConsultancy = $req->doctorConsultancy;
        $pendingJob->description = $req->description;

        $pendingJob->save();

        $patientRecord->preparedBy = $req->preparedBy;
        $patientRecord->pRole = $req->pRole;
        $patientRecord->dConsultancy = $req->doctorConsultancy;
        $patientRecord->description = $req->description;        

        $result = $patientRecord->save();

        if($result) {
            return redirect('/pendingJob')->with('success', 'Prescription prepared sucessfull!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check again.');
        }
    }

    // ===========Senior Pharmacist Functionalities===========

    //view pending jobs for senior pharmacists
    function viewJobsSNR()
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

        // Fetch only pending jobs where 'preparedBy' is not null
        $data = PendingJob::whereNotNull('preparedBy')->get();

        // Render the page with the filtered data
        return view('treatments/pendingJobSNR', compact('data'));
    }

    //check medicine by junior pharmacists
    function checkMedicine($id)
    {
        if (!Session::has('loginId')) {
            return redirect('/login')->with('fail', 'Access Denied! You have to log in first!');
        }

        $userId = Session::get('loginId');
        $pharmacist = User::find($userId);

        if (!in_array($pharmacist->role, ['Junior Pharmacist', 'Senior Pharmacist'])) {
            return redirect('/dashboard')->with('fail', 'Only pharmacists can perform this operation.');
        }

        $patientRecord = PatientRecord::find($id);

        if (!$patientRecord) {
            return redirect()->route('pendingJobSNR')->with('fail', 'Record not found.');
        }

        // Pass necessary data explicitly
        return view('treatments/confirmJobSNR', [
            'job' => $patientRecord,
            'currentUser' => $pharmacist,
            'description' => $patientRecord->description ?? '', // Handle null descriptions gracefully
        ]);
    }

    function saveReport(Request $req) {
        $patientRecord = PatientRecord::where('id', $req->appId)->first();
        $pendingJob = PendingJob::where('id', $req->appId)->first();       
        
        $patientRecord->checkedBy = $req->checkedBy;
        $patientRecord->cRole = $req->cRole;       

        $result = $patientRecord->save();
        $pendingJob->delete();

        if($result) {
            return redirect('/pendingJobSNR')->with('success', 'Prescription checked sucessfull!');
        } else {
            return back()->with('fail', 'Somthing worng!, Please check again.');
        }
    }

}
