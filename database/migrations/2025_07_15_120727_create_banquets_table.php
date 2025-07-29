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
            $table->unsignedBigInteger('manager_id')->unique();
            $table->unsignedBigInteger('images_id')->unique()->nullable();
            $table->string('name');
            $table->string('address');
            $table->text('description')->nullable();
            $table->integer('guest_capacity')->nullable();
            $table->json('social_media_links')->nullable();
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->decimal('rental_rate', 10, 2)->nullable();
            $table->decimal('advance_amount', 10, 2)->nullable();
            $table->string('parking_available')->nullable();
            $table->string('personal_caterer_available')->nullable();
            $table->string('personal_decorator_available')->nullable();
            $table->string('outside_decorator_allowed')->nullable();
            $table->string('ac')->nullable();
            $table->string('screen_available')->nullable();
            $table->string('sound_system_available')->nullable();
            $table->string('bridal_room_available')->nullable();
            $table->string('fire_safety')->nullable();
            $table->string('security_personnel')->nullable();
            $table->enum('status', ['active', 'inactive', 'maintenance', 'pending', 'approved', 'rejected'])->default('pending');
            $table->foreign('manager_id')->references('id')->on('banquet_managers')->onDelete('cascade');
            $table->foreign('images_id')->references('id')->on('banquet_images')->onDelete('set null');
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
