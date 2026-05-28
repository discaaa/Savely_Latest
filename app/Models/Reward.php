<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [

        'name',
        'price_points'

    ];

    public function claims()
    {
        return $this->hasMany(
            RewardClaim::class
        );
    }
}