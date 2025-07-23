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
        Schema::create('banquet_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banquet_id')->nullable()->unique();
            $table->string('profile_image');
            $table->string('cover_image');
            $table->string('img_1');
            $table->string('img_2');
            $table->string('img_3');
            $table->string('img_4');
            $table->string('img_5');
            $table->string('img_6');
            $table->timestamps();
            $table->foreign('banquet_id')->references('id')->on('banquets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banquet_images');
    }
};
