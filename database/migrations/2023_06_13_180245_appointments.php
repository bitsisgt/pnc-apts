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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained();
            $table->foreignId('doctor_id')->constrained();
            $table->foreignId('hospital_id')->constrained();
            $table->foreignId('speciality_id')->nullable()->constrained();
            $table->enum('status', ['ACTIVA', 'CANCELADA', 'FINALIZADA'])->default('ACTIVA');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->integer('day_of_week');
            $table->softDeletes();
            $table->timestamps();

            $table->index('start_date');
            $table->index('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
