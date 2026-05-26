<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('challenges', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->text('description');

            $table->integer('target');

            $table->integer('reward_points');

            $table->enum('type', [
                'saving_streak',
                'budget_control',
                'goal_complete'
            ]);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
