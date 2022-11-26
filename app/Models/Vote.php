<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'user_id',
        'vote',
    ];

    public function review(){
        return $this->belongsTo(Review::class);
    }
}
