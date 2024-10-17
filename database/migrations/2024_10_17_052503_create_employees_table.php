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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('CASCADE');
            $table->foreignId('department_id')->constrained()->onDelete('restrict');
            $table->string('address');
            $table->string('place_of_birth')->nullable();
            $table->date('dob')->nullable();
            $table->enum('religion',['islam', 'Katolik', 'Protestan', 'Hindu', 'Budha', 'Konghucu']);
            $table->enum('sex', ['Male', 'Female']);
            $table->string('phone');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
