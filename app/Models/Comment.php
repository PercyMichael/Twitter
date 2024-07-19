<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'tweet_id'];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
