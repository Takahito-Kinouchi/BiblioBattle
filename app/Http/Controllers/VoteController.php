<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function vote(Request $request){
        $review_id = $request->review_id;
        $user_id = auth()->id();

        switch ($request->path()){
            case 'votes/upvote':
                $vote = 1;
                break;
            case 'votes/downvote':
                $vote = -1;
                break;
        }

        //すでに評価済みのときはそれを削除
        $previous_vote = Vote::where('review_id', $review_id)
            ->where('user_id', $user_id);
        if($previous_vote->count() > 0){
            Vote::destroy($previous_vote->get());
        }
        $review_vote = array(
            "review_id" => $review_id,
            "user_id" => $user_id,
            "vote" => $vote,
        );

        //新規投票作成
        Vote::create($review_vote);

        return back()->with('message', '書評を投稿しました！');
    }
}

