<?php

namespace App\Http\Controllers;

use App\Models\BookReview;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function upvote($id){
        $user_id = BookReview::where('id', $id)->get('user_id');
        //make sure logged in user is owner
        if ($user_id == auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        
    }
}
