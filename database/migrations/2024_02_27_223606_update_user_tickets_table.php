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
        Schema::table('user_tickets', function (Blueprint $table) {
            $table->dropColumn(['participant_user_id']);
            $table->dropColumn(['ticket_id']);
            $table->dropColumn(['weekly_ranking_id']);
        });

        Schema::table('user_tickets', function (Blueprint $table) {
            $table->foreignId('participant_user_id')->constrained('participant_users')->cascadeOnDelete();
            $table->foreignId('ticket_id')->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('weekly_ranking_id')->constrained('weekly_rankings')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_tickets', function (Blueprint $table) {
            $table->dropForeign(['participant_user_id']);
            $table->dropForeign(['ticket_id']);
            $table->dropForeign(['weekly_ranking_id']);
        });
    }
};
