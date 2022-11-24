<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function upvote(Request $request){
        dd($request);
        $vote = array(
            "review_id" => $request->review_id,
            "user_id" => auth()->id(),
            "vote" => 1,
        );

        //新規投票作成
        Vote::create($vote);

        return back()->with('message', '書評を投稿しました！');
    }

    // public function downvote(VoteStoreRequest $request){
    //     //この時点でバリデーション済み
    //     $vote = $request->validated();
    //     $vote['vote'] = 1;

    //     //新規投票作成
    //     Vote::create($vote);

    //     return back()->with('message', '書評を投稿しました！');
    // }
}

