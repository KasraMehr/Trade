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
        Schema::table('balance_logs', function (Blueprint $table) {
            $table->enum('type', [
                'deposit',
                'withdrawal',
                'investment',
            ])->default('deposit')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('balance_logs', function (Blueprint $table) {
            //
        });
    }
};
