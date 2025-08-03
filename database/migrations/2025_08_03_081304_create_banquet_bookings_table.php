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
        Schema::create('banquet_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->date('event_date');
            $table->string('event_time');
            $table->text('special_requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banquet_bookings');
    }
};
