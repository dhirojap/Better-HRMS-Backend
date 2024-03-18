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
            $table->uuid('user_id');
            $table->string('username', 50)->nullable(false)->unique('users_username_unique');
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->string('email', 50)->nullable(false)->unique('users_email_unique');
            $table->enum('gender', ['Male', 'Female'])->nullable(false);
            $table->string('phone_number', 12)->nullable(true)->unique('users_phone_number_unique');
            $table->string('password', 50)->nullable(false);
            $table->enum('role', ['User, Admin'])->nullable(false);
            $table->timestamps();
            $table->softDeletes();
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
