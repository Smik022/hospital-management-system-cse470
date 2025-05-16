<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
    $table->id();

    // Only define room_id once, and chain constrained() for foreign key:
    $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');

    $table->foreignId('patient_id')->constrained()->onDelete('cascade');
    
    $table->dateTime('admit_date');
    $table->dateTime('discharge_date')->nullable();

    $table->timestamps();
});
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
