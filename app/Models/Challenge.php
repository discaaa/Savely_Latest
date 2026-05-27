<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'title',
        'description',
        'target',
        'reward_points',
        'type'
    ];

    public function userChallenges()
    {
        return $this->hasMany(UserChallenge::class);
    }
}