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
        Schema::create('banquets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('address');
            $table->string('area');
            $table->integer('capacity');
            $table->string('parking_availiable');
            $table->string('social_media');
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->decimal('rate', 10, 2);
            $table->decimal('advance_amount', 10, 2);
            $table->string('catering_available');
            $table->string('outside_catering_allowed');
            $table->string('decoration_available');
            $table->string('outside_decoration_allowed');
            $table->string('ac');
            $table->string('screen_available');
            $table->string('sound_system_available');
            $table->string('bridal_room_available');
            $table->string('fire_safety');
            $table->string('security_available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banquets');
    }
};
