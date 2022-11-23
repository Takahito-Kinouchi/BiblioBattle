<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
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
}
