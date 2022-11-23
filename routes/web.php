<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//show register
Route::get('/user/register', [UserCOntroller::class, 'register']);
//store register data and log in
Route::post('/users', [UserController::class, 'store']);
//show login
Route::get('/user/login', [UserController::class, 'login']);
//validate login data and login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//show all reviews
Route::get('/', [ReviewController::class, 'index']);






