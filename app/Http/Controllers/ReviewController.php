<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\ReviewStoreRequest;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::get()->sortByDesc(function($query){
            return $query->votes->sum('vote');
        })->take(6);

        return view('reviews.index', [
            'reviews' => $reviews,
        ]);
    }

    public function show($id){
        $review = Review::where('id', '=', $id)->first();

        return view('reviews.single', [
            'review' => $review,
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
        Review::create($entry);

        return redirect('/')->with('message', '書評を投稿しました！');
    }

    public function manage(){
        $reviews = Review::where('user_id', auth()->id())->get();

        return view('reviews.manage', [
            'reviews' => $reviews,
        ]);
    }

    public function update(ReviewStoreRequest $request, $id){
        $review = Review::where('id', $id)->first();

        //make sure logged in user is owner
        if ($review->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }

        $entry = $request->validated();

        $review->update($entry);

        return redirect('/')->with('message', 'review updated successfully!');
    }

    public function edit($id){
        $review = Review::where('id', $id)->first();

        return view('reviews.edit', ['review' => $review]);
    }

    public function destroy($id){
        $review = Review::where('id', $id)->first();

        //make sure logged in user is owner
        if ($review->user_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }
        $review->delete();

        return redirect('/')->with('message', 'review deleted successfully!');
    }
}
