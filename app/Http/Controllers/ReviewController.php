<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BookReview;
use App\Http\Requests\ReviewStoreRequest;

class ReviewController extends Controller
{
    public function index(){
        $reviews = BookReview::orderby('vote', 'desc')->take(6)->get();
        $user_ids = array_column($reviews->toArray(), 'user_id');
        $users = User::whereIn('id', $user_ids)->get(['id', 'name']);
        return view('reviews.index', [
            'reviews' => $reviews,
            'users' => $users
        ]);
    }

    public function show($id){
        $review = BookReview::where('id', '=', $id)->first();
        $user_id = $review->user_id;
        $user = User::where('id', '=', $user_id)->first()->only(['id', 'name']);

        return view('reviews.single', [
            'review' => $review,
            'user' => $user,
        ]);
    }

    public function entry(){
        return view('reviews.entry');
    }

    public function store(ReviewStoreRequest $request)
    {
        //この時点でStoreUserRequestによりバリデーション済み
        $entry = $request->validated();
        $entry['user_id'] = auth()->id();

        //新規エントリー作成
        BookReview::create($entry);

        return redirect('/')->with('message', '書評を投稿しました！');
    }

    public function manage(){
        $reviews = BookReview::where('user_id', auth()->id())->get();

        return view('reviews.manage', [
            'reviews' => $reviews,
        ]);
    }

    public function update(ReviewStoreRequest $request, BookReview $bookReview){
        //make sure logged in user is owner
        dd($bookReview);
        if ($bookReview->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $entry = $request->validated();

        $bookReview->update($entry);

        return back()->with('message', 'review updated successfully!');



    }

    public function edit($id){
        $review = BookReview::where('id', $id)->first();
        return view('reviews.edit', ['review' => $review]);

    }
}
