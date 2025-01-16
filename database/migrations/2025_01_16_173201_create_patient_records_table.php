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
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->integer('appNo');
            $table->date('date');
            $table->string('disease');
            $table->string('drugName');
            $table->string('dosage');
            $table->string('patientStatus');
            $table->string('substitutionStatus');
            $table->string('dName');
            $table->string('preparedBy')->nullable();
            $table->string('pRole')->nullable();
            $table->string('dConsultancy')->nullable();
            $table->string('description')->nullable();
            $table->string('checkedBy')->nullable();
            $table->string('cRole')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_records');
    }
};
