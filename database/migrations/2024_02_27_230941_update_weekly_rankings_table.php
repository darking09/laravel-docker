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
        Schema::table('weekly_rankings', function (Blueprint $table) {
            $table->dropColumn(['participant_user_id']);
            $table->dropColumn(['weekly_ranking_types_id']);
        });

        Schema::table('weekly_rankings', function (Blueprint $table) {
            $table->foreignId('participant_user_id')->constrained('participant_users')->cascadeOnDelete();
            $table->foreignId('weekly_ranking_types_id')->constrained('weekly_ranking_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weekly_rankings', function (Blueprint $table) {
            $table->dropForeign(['participant_user_id']);
            $table->dropForeign(['weekly_ranking_types_id']);
        });
    }
};
