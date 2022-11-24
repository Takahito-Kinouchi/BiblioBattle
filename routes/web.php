<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;

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
Route::get('/users/register', [UserCOntroller::class, 'register'])->middleware('guest');

//store register data and log in
Route::post('/users', [UserController::class, 'store']);

//show login
Route::get('/users/login', [UserController::class, 'login'])->middleware('guest');

//validate login data and login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//logout
Route::post('/users/logout', [UserController::class, 'logout']);

//show all reviews
Route::get('/', [ReviewController::class, 'index']);

//show review entry form
Route::get('/reviews/entry', [ReviewController::class, 'entry'])->middleware('auth');

//store review entry
Route::post('/reviews', [ReviewController::class, 'store'])->middleware('auth');

//show review manage form
Route::get('/reviews/manage', [ReviewController::class, 'manage'])->middleware('auth');

//show edit form
Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->middleware('auth');

//update review
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->middleware('auth');

//delete review
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->middleware('auth');

//show single review
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

Route::post('/votes', [VoteController::class, 'upvote']);





