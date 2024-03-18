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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id('attendance_id');
            $table->foreignUuid('user_id')->nullable(false);
            $table->foreignId('schedule_id')->nullable(false);
            $table->dateTime('check_in')->nullable(true);
            $table->dateTime('check_out')->nullable(true);
            $table->date('date')->nullable(false);
            $table->enum('status', ['Pending', 'Early', 'On Time', 'Late', 'Absent', 'Invalid'])->nullable(false);
            $table->string('description', 255)->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
