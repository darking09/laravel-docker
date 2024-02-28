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
        Schema::table('global_rankings', function (Blueprint $table) {
            $table->dropColumn(['participant_user_id']);
        });

        Schema::table('global_rankings', function (Blueprint $table) {
            $table->foreignId('participant_user_id')->constrained('participant_users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('global_rankings', function (Blueprint $table) {
            $table->dropForeign(['participant_user_id']);
        });
    }
};
