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
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->default(\Illuminate\Support\Str::uuid());
            $table->string('slug')->nullable();
            $table->foreignId('president_id')->nullable()->constrained('users');
            $table->string('name');
            $table->string('sigle');
            $table->text('description')->nullable();
            $table->longText('history')->nullable();
            $table->string('location')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('communities');
    }
};
