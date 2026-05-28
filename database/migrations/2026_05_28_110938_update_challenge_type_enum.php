<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE challenges
            MODIFY type ENUM(
                'budget_control',
                'saving_streak',
                'goal_complete',
                'expense_tracking',
                'budget_saver',
                'saving_master',
                'challenge_complete',
                'point_earn',
                'no_spend'
            )
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE challenges
            MODIFY type ENUM(
                'saving_streak',
                'goal_complete',
                'budget_control'
            )
        ");
    }
};