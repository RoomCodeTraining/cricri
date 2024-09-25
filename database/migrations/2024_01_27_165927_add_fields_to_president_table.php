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
            $table->date('leadership_start_date')->nullable();
            $table->date('leadership_end_date')->nullable();
            $table->enum('leadership_status', ['active', 'inactive'])->default('active');
            $table->text('pastoral_experience')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'leadership_start_date',
                'leadership_end_date',
                'leadership_status',
                'pastoral_experience'
            ]);
        });
    }
};
