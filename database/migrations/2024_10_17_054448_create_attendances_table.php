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
            $table->id();
            $table->foreign('user_id')->references('user_id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('user_id'); // Kolom user_id
            $table->date('attendance_date'); // Tanggal absensi
            $table->enum('status', ['present', 'absent', 'on_leave'])->default('present'); // Status absensi
            $table->timestamps();
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
