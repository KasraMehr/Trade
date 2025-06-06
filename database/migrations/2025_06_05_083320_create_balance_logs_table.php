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
      Schema::create('balance_logs', function (Blueprint $table) {
          $table->id();
          $table->foreignId('user_id')->constrained()->onDelete('cascade');
          $table->decimal('amount', 16, 2);
          $table->enum('type', ['deposit', 'withdrawal', 'trade_gain', 'trade_loss']);
          $table->text('description')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_logs');
    }
};
