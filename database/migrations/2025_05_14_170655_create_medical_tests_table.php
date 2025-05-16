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
        // Create 'medical_tests' table with the required columns
        Schema::create('medical_tests', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('patient_name'); // Patient's name
            $table->string('phone_number'); // Patient's phone number
            $table->string('test_name'); // Test name
            $table->date('test_date'); // Test date
            $table->time('test_time'); // Test time
            $table->timestamps(); // Created at and updated at columns
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'medical_tests' table if it exists
        Schema::dropIfExists('medical_tests');
    }
};


