<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_title',
        'user_id',
        'book_title',
        'author',
        'publisher',
        'content',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
