<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TempUserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientRecordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Welcome Page
Route::get('/', function () {
    return view('auth/Home');
});

//user login & logout operations
Route::view('/login', 'auth/userLogin');
Route::post('/login', [UserController::class, 'loginUser']);
Route::get('/dashboard',[UserController::class,'dashboards']);
Route::get('/logout',[UserController::class,'logout']);
//Add user by admin
Route::view('/addUser','auth/addUser');
Route::post('/addUser',[UserController::class,'addUser']);

//user authentication and registration operations
Route::view('/register', 'auth/userRegister');
Route::post('/register',[TempUserController::class, 'addTempUser']);
Route::get('/tempList',[TempUserController::class, 'showRequest']);
Route::get('approve/{id}',[TempUserController::class, 'registerUser']);
Route::get('reject/{id}',[TempUserController::class, 'rejectRequest']);

//User management Operations
Route::view('/viewUsers', 'auth/ViewUsers');
Route::get('/userList',[UserController::class, 'showUsers']);
Route::get('remove/{id}',[UserController::class, 'removeUser']);
Route::get('edit/{id}',[UserController::class, 'editUser']);
Route::post('/updateUser',[UserController::class,'updateUser']);

//Make Patient Appointments
Route::get('/appointment', [AppointmentController::class, 'showMakeAppointmentForm']);
Route::post('/setAppointment', [AppointmentController::class, 'setAppointment']);
Route::get('/appList', [AppointmentController::class, 'showAppointments']);

//Treatement
Route::get('/prescription/{id}', [AppointmentController::class, 'showPrescriptionForm']);
Route::post('/prescription/save', [AppointmentController::class, 'savePrescription']);

//Issue Medicine Processing
Route::get('/pendingJob', [PatientRecordController::class, 'viewJobsJNR']);
Route::get('/prepareMedicine/{id}', [PatientRecordController::class, 'prepareMedicine']);
Route::post('/savePreparation', [PatientRecordController::class, 'savePreparation']);
Route::view('/checkJob', 'treatments/checkJobJNR');

//Senior Pharmacists operations
Route::get('/pendingJobSNR', [PatientRecordController::class, 'viewJobsSNR']);
Route::get('/checkMedicine/{id}', [PatientRecordController::class, 'checkMedicine']);
Route::post('/saveReport', [PatientRecordController::class, 'saveReport']);