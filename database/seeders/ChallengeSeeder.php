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
        // daily
        Challenge::create([
            'title' => 'No Spend Day',
            'description' => 'Don’t spend money for today.',
            'target' => 1,
            'reward_points' => 30,
            'type' => 'no_spend',
            'duration_type' => 'daily'
        ]);

        Challenge::create([
            'title' => 'Save Rp50.000',
            'description' => 'Save at least Rp50.000 today.',
            'target' => 50000,
            'reward_points' => 40,
            'type' => 'saving_streak',
            'duration_type' => 'daily'
        ]);

        Challenge::create([
            'title' => 'Track 3 Expenses',
            'description' => 'Add 3 expense records today.',
            'target' => 3,
            'reward_points' => 20,
            'type' => 'expense_tracking',
            'duration_type' => 'daily'
        ]);

        Challenge::create([
            'title' => 'Stay Under Budget',
            'description' => 'Do not exceed your budget today.',
            'target' => 1,
            'reward_points' => 40,
            'type' => 'budget_saver',
            'duration_type' => 'daily'
        ]);

        Challenge::create([
            'title' => 'Morning Saver',
            'description' => 'Save money before noon.',
            'target' => 20000,
            'reward_points' => 35,
            'type' => 'saving_streak',
            'duration_type' => 'daily'
        ]);

        Challenge::create([
            'title' => 'Log All Expenses',
            'description' => 'Track 5 expenses today.',
            'target' => 5,
            'reward_points' => 55,
            'type' => 'expense_tracking',
            'duration_type' => 'daily'
        ]);

        // weekly
        Challenge::create([
            'title' => 'Save Rp500.000',
            'description' => 'Save Rp500.000 this week.',
            'target' => 500000,
            'reward_points' => 150,
            'type' => 'saving_streak',
            'duration_type' => 'weekly'
        ]);

        Challenge::create([
            'title' => '7 Days Expense Tracking',
            'description' => 'Track expenses consistently this week.',
            'target' => 7,
            'reward_points' => 120,
            'type' => 'expense_tracking',
            'duration_type' => 'weekly'
        ]);

        Challenge::create([
            'title' => 'Budget Master',
            'description' => 'Stay within budget for 5 days.',
            'target' => 5,
            'reward_points' => 180,
            'type' => 'budget_saver',
            'duration_type' => 'weekly'
        ]);

        Challenge::create([
            'title' => 'Complete 2 Saving Goals',
            'description' => 'Complete 2 goals this week.',
            'target' => 2,
            'reward_points' => 180,
            'type' => 'goal_complete',
            'duration_type' => 'weekly'
        ]);

        Challenge::create([
            'title' => 'No Overspending Week',
            'description' => 'Avoid overspending this week.',
            'target' => 7,
            'reward_points' => 150,
            'type' => 'budget_saver',
            'duration_type' => 'weekly'
        ]);

        Challenge::create([
            'title' => 'Smart Saver',
            'description' => 'Save money 5 times this week.',
            'target' => 5,
            'reward_points' => 120,
            'type' => 'saving_master',
            'duration_type' => 'weekly'
        ]);

        // achievemen
        Challenge::create([
            'title' => 'First Saving Goal',
            'description' => 'Complete your first saving goal.',
            'target' => 1,
            'reward_points' => 300,
            'type' => 'goal_complete',
            'duration_type' => 'achievement'
        ]);

        Challenge::create([
            'title' => 'Save Rp1.000.000',
            'description' => 'Reach Rp1.000.000 total savings.',
            'target' => 1000000,
            'reward_points' => 350,
            'type' => 'saving_streak',
            'duration_type' => 'achievement'
        ]);

        Challenge::create([
            'title' => 'Expense Tracker Pro',
            'description' => 'Track 100 expenses.',
            'target' => 100,
            'reward_points' => 400,
            'type' => 'expense_tracking',
            'duration_type' => 'achievement'
        ]);

        Challenge::create([
            'title' => 'Challenge Hunter',
            'description' => 'Complete 25 challenges.',
            'target' => 25,
            'reward_points' => 450,
            'type' => 'challenge_complete',
            'duration_type' => 'achievement'
        ]);

        Challenge::create([
            'title' => 'Point Collector',
            'description' => 'Earn 5000 points.',
            'target' => 5000,
            'reward_points' => 500,
            'type' => 'point_earn',
            'duration_type' => 'achievement'
        ]);

        Challenge::create([
            'title' => 'Financial Discipline',
            'description' => 'Stay under budget 30 times.',
            'target' => 30,
            'reward_points' => 300,
            'type' => 'budget_saver',
            'duration_type' => 'achievement'
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