<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('password', 100);
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('email', 100)->unique();
            $table->integer('current_streak')->default(0); //
            $table->date('last_saving_date')->nullable(); //
            $table->timestamps();
        });

        Schema::create('expense_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); //
            $table->timestamps();
        });

        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->integer('points_reward');
            $table->integer('target_value'); //
            $table->timestamps();
        });

        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('points_required'); //
            $table->timestamps();
        });

        Schema::create('goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title', 100);
            $table->decimal('target_amount', 15, 2); //
            $table->decimal('current_amount', 15, 2)->default(0); //
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing'); //
            $table->timestamps();
        });

        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('expense_categories')->onDelete('cascade');
            $table->decimal('limit_amount', 15, 2); //
            $table->integer('month');
            $table->integer('year'); //
            $table->timestamps();
        });
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('expense_categories')->onDelete('cascade');
            $table->decimal('amount', 15, 2); //
            $table->text('note')->nullable();
            $table->date('date'); //
            $table->timestamps();
        });
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('goal_id')->nullable()->constrained('goals')->onDelete('set null'); //
            $table->decimal('amount', 15, 2); //
            $table->enum('type', ['daily', 'weekly']);
            $table->enum('status', ['saved', 'used'])->default('saved');
            $table->date('date'); //
            $table->timestamps();
        });
        Schema::create('user_challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('challenge_id')->constrained('challenges')->onDelete('cascade');
            $table->integer('progress')->default(0);
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing'); //
            $table->timestamps();
        });// Saldo Poin
        Schema::create('user_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('points')->default(0); //
            $table->timestamps();
        });

        // History Poin (Baru)
        Schema::create('point_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('amount'); 
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('reward_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('reward_id')->constrained('rewards')->onDelete('cascade');
            $table->timestamp('date')->useCurrent(); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('expense_categories');
        Schema::dropIfExists('challenges');
        Schema::dropIfExists('rewards');
        Schema::dropIfExists('goals');
        Schema::dropIfExists('budgets');
        Schema::dropIfExists('expenses');
        Schema::dropIfExists('savings');
        Schema::dropIfExists('user_challenges');
        Schema::dropIfExists('user_points');
        Schema::dropIfExists('point_logs');
        Schema::dropIfExists('reward_claims');
    }
};
