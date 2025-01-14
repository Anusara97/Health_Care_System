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

//user login & logout operations
Route::view('/login', 'auth/userLogin');
Route::post('/login', [UserController::class, 'loginUser']);
Route::get('/dashboard',[UserController::class,'dashboards']);
Route::get('/logout',[UserController::class,'logout']);

//user authentication and registration operations
Route::view('/register', 'auth/userRegister');
Route::post('/register',[TempUserController::class, 'addTempUser']);
Route::get('/tempList',[TempUserController::class, 'showRequest']);
Route::get('approve/{id}',[TempUserController::class, 'registerUser']);
Route::get('reject/{id}',[TempUserController::class, 'rejectRequest']);

Route::view('/viewUsers', 'auth/ViewUsers');
Route::get('/userList',[UserController::class, 'showUsers']);
Route::get('remove/{id}',[UserController::class, 'removeUser']);
Route::get('edit/{id}',[UserController::class, 'editUser']);
Route::post('/updateUser',[UserController::class,'updateUser']); //visible to admin