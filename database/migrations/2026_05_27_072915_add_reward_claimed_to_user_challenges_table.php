<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'user_challenges',
            function (Blueprint $table) {

                $table->boolean(
                    'reward_claimed'
                )->default(false);

            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'user_challenges',
            function (Blueprint $table) {

                $table->dropColumn(
                    'reward_claimed'
                );

            }
        );
    }
};