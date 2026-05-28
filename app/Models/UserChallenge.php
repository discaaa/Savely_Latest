<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    protected $fillable = [
        'user_id',
        'challenge_id',
        'challenge_date',
        'progress',
        'status',
        'reward_claimed',
    ];

    protected $attributes = [
        'progress' => 0,
        'status' => 'ongoing',
        'reward_claimed' => false,
    ];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}