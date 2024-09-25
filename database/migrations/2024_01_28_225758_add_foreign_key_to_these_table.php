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
            $table->foreignId('commune_id')->nullable()->constrained('communes');
            $table->foreignId('community_id')->nullable()->constrained('communities');
            $table->foreignId('church_id')->nullable()->constrained('churches'); 
            $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods');
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('commune_id')->nullable()->constrained('communes');
            $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods');
        });

        Schema::table('churches', function (Blueprint $table) {
            $table->foreignId('community_id')->nullable()->constrained('communities');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->foreignId('commune_id')->nullable()->constrained('communes');
            $table->foreignId('neighborhood_id')->nullable()->constrained('neighborhoods');
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
            $table->dropForeign(['commune_id']);
            $table->dropForeign(['community_id']);
            $table->dropForeign(['neighborhood_id']);
            $table->dropColumn(['church_id', 'city_id', 'commune_id', 'community_id', 'neighborhood_id']);
        });

        Schema::table('churches', function (Blueprint $table) {
            $table->dropForeign(['community_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['commune_id']);
            $table->dropForeign(['neighborhood_id']);
            $table->dropColumn(['community_id', 'city_id', 'commune_id', 'neighborhood_id']);
        });

        Schema::table('communities', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['commune_id']);
            $table->dropForeign(['neighborhood_id']);
            $table->dropColumn(['city_id', 'commune_id', 'neighborhood_id']);
        });
    }
};
