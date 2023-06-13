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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('profile_id')->unique()->nullable()->constrained();
            $table->enum('type', ['SISPE', 'ACADEMIA', 'MINGOB', 'OTRO'])->nullable();
            $table->date('last_visit')->nullable();
            $table->string('id_number')->nullable();
            $table->string('medical_number')->nullable();
            $table->text('emergency_contact')->nullable();
            $table->integer('recurrence')->default(0);
            $table->integer('prescriptions_count')->default(0);
            $table->text('allergies')->nullable();
            $table->text('qr')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('id_number');
            $table->index('medical_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
