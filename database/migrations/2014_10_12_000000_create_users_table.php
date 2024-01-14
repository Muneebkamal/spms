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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('role', ['admin','agent'])->default('agent');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('contact_permission')->default(false);
            $table->boolean('photo_permission')->default(false);
            $table->string('image')->nullable();
            $table->enum('theme', ['light','dark'])->default('light');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
