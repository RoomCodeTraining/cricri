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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('municipality_id')->nullable()->constrained('municipalities');
            $table->foreignId('community_id')->nullable()->constrained('communities');
            $table->foreignId('church_id')->nullable()->constrained('churches');
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('municipality_id')->nullable()->constrained('municipalities');
        });

        Schema::table('churches', function (Blueprint $table) {
            $table->foreignId('community_id')->nullable()->constrained('communities');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('municipality_id')->nullable()->constrained('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['church_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['municipality_id']);
            $table->dropForeign(['community_id']);
            $table->dropColumn(['church_id', 'city_id', 'municipality_id', 'community_id']);
        });

        Schema::table('churches', function (Blueprint $table) {
            $table->dropForeign(['community_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['municipality_id']);
            $table->dropColumn(['community_id', 'city_id', 'municipality_id']);
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['municipality_id']);
            $table->dropColumn(['city_id', 'municipality_id']);
        });
    }
};
