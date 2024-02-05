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
        Schema::create('photos', function (Blueprint $table) {
            $table->id('image_id');
            $table->string('image');
            $table->string('code');
            $table->string('image_created_at')->default(now());
            $table->string('room_number');
            $table->string('image_watermark');
            $table->string('image_resized');
            $table->string('size');
            $table->string('price');
            $table->boolean('is_deleted')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo');
    }
};
