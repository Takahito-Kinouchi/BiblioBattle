<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CommentController;

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

//send email verification notification
Route::get('/email/verify', [EmailController::class, 'send'])->middleware(['auth', 'signed'])->name('verification.notice');

//receive email verification notification
Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'receive'])->middleware(['auth', 'signed'])->name('verification.verify');

//resend email verification notification
Route::post('/email/verification-notification', [EmailController::class, 'resend'])->middleware(['auth', 'throttle:6, 1'])->name('verification.send');

//show all reviews
Route::get('/', [ReviewController::class, 'index']);

//show review entry form
Route::get('/reviews/entry', [ReviewController::class, 'entry'])->middleware('UserEmailIsVerified');

//store review entry
Route::post('/reviews', [ReviewController::class, 'store'])->middleware('UserEmailIsVerified');

//show review manage form
Route::get('/reviews/manage', [ReviewController::class, 'manage'])->middleware('auth');

//show edit form
Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->middleware('UserEmailIsVerified');

//update review
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->middleware('UserEmailIsVerified');

//delete review
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->middleware('UserEmailIsVerified');

//show single review
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

//upvote review
Route::post('/votes/upvote', [VoteController::class, 'vote'])->middleware('UserEmailIsVerified');

//downvote review
Route::post('/votes/downvote', [VoteController::class, 'vote'])->middleware('UserEmailIsVerified');

//comment on review
Route::post('/comments', [CommentController::class, 'store'])->middleware('UserEmailIsVerified');

//edit your comment

