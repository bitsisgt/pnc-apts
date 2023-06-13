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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('last_name')->nullable();
            $table->text('married_name')->nullable();
            $table->string('dpi')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->string('birth_place')->nullable();
            $table->text('address')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('gender', ['M', 'F', 'O'])->nullable();
            $table->string('marital_status')->nullable();
            $table->string('ethnicity')->nullable();
            $table->text('father_name')->nullable();
            $table->text('mother_name')->nullable();
            $table->integer('child_count')->default(0);
            $table->text('child_names')->nullable();
            $table->text('photo')->nullable();
            $table->date('sispe_start_date')->nullable();
            $table->string('sispe_unit')->nullable();
            $table->string('sispe_place')->nullable();
            $table->string('sispe_nominal_position')->nullable();
            $table->string('sispe_functional_position')->nullable();
            $table->string('sispe_rank')->nullable();
            $table->string('sispe_status')->nullable();
            $table->date('sispe_end_date')->nullable();
            $table->date('mingob_start_date')->nullable();
            $table->string('mingob_unit')->nullable();
            $table->string('mingob_nominal_position')->nullable();
            $table->string('mingob_functional_position')->nullable();
            $table->string('mingob_budget_line')->nullable();
            $table->date('mingob_end_date')->nullable();
            $table->date('academy_start_date')->nullable();
            $table->date('academy_end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('dpi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
