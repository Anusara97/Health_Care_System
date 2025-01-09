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
        Schema::create('senior_pharmacists', function (Blueprint $table) {
            Schema::create('senior_pharmacists', function (Blueprint $table) {
                $table->id();
                $table->string('sPid')->unique();
                $table->foreignId('id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('senior_pharmacists');
    }
};
