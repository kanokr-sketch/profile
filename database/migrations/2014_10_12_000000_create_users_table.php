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
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->enum('role', ['admin', 'employee'])->default('employee');
            $table->enum('gender', ['male','female','other'])->nullable();  // เพิ่ม
            $table->date('birthdate')->nullable();                            // เพิ่ม
            $table->string('address')->nullable();                            // เพิ่ม
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
