<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BookReview;

class ReviewController extends Controller
{
    public function index(){
        $reviews = BookReview::orderby('vote', 'desc')->get();
        $user_ids = array_column($reviews->toArray(), 'user_id');
        $users = User::whereIn('id', $user_ids)->get(['id', 'name']);
        return view('review.index', [
            'reviews' => $reviews,
            'users' => $users
        ]);
    }
}
