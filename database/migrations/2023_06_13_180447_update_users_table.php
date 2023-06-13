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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip')->after('password')->nullable();
            $table->enum('type', ['SISPE', 'ACADEMIA', 'MINGOB', 'OTRO'])->after('password')->nullable();
            $table->string('phone')->after('password')->nullable();
            $table->enum('role', ['PUBLIC', 'CHECK', 'ADMIN', 'DOC'])->default('PUBLIC');

            $table->index('nip');
            $table->index('type');
            $table->index('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nip');
            $table->dropColumn('type');
            $table->dropColumn('phone');
        });
    }
};
