<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Challenge;
use App\Models\Reward;
use App\Models\Activity;

class ChallengeSeeder extends Seeder
{
    public function run(): void
    {
        Challenge::create([
            'title' => 'No Spend Day',
            'description' => 'Don’t spend money for 1 day',
            'reward_points' => 100,
            'status' => 'Ongoing'
        ]);

        Challenge::create([
            'title' => 'Save 100k',
            'description' => 'Save Rp100.000 this week',
            'reward_points' => 80,
            'status' => 'Ongoing'
        ]);

        Reward::create([
            'name' => 'Cat Border',
            'price_points' => 3000
        ]);

        Reward::create([
            'name' => 'Panda Avatar',
            'price_points' => 3000
        ]);

        Activity::create([
            'title' => 'Completed challenge',
            'description' => 'You completed a challenge'
        ]);

        Activity::create([
            'title' => 'Built a Streak',
            'description' => 'You built a new streak'
        ]);
    }
}