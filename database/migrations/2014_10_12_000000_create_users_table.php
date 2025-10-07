<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');        // เพิ่ม
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();          // เพิ่ม
            $table->string('profile_image')->nullable(); // เพิ่ม
            $table->string('position')->nullable();      // เพิ่ม
            $table->string('department')->nullable();    // เพิ่ม
            $table->enum('role', ['admin', 'employee'])->default('employee'); // เพิ่ม
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

