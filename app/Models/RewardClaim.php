<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RewardClaim extends Model
{
    protected $fillable = [

        'user_id',
        'reward_id'

    ];

    public function reward()
    {
        return $this->belongsTo(
            Reward::class
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }
}