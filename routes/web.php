<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TempUserController;

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

Route::get('/', function () {
    return view('auth/Home');
});

//user authentication and registration operations
Route::view('/register', 'auth/userRegister');
Route::post('/register',[TempUserController::class, 'addTempUser']);
Route::get('/tempList',[TempUserController::class, 'showRequest']);
Route::get('approve/{id}',[TempUserController::class, 'registerUser']);
Route::get('remove/{id}',[TempUserController::class, 'rejectRequest']);

Route::view('/dashboard', 'dashboards/adminDashboard');
Route::view('/viewUsers', 'auth/ViewUsers');
Route::get('/userList',[UserController::class, 'showUsers']);