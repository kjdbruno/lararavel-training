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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patientcode');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename')->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->date('birthdate');
            $table->string('contactnumber');
            $table->string('email')->nullable();
            $table->string('address');
            $table->enum('bloodtype', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->text('allergies')->nullable();
            $table->string('emergencycontactname');
            $table->string('emergencycontactnumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
