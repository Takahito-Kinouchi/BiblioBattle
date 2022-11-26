<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request){
        //この時点でStoreUserRequestによりバリデーション済み
        $entry = $request->validated();
        $entry['user_id'] = auth()->id();

        //新規エントリー作成
        Comment::create($entry);

        return back()->with('message', 'コメントを投稿しました！');
    }
    
}
