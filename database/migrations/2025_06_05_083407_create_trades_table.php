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
      Schema::create('trades', function (Blueprint $table) {
          $table->id();
          $table->foreignId('user_id')->constrained()->onDelete('cascade');
          $table->decimal('amount_invested', 16, 2);
          $table->decimal('profit_or_loss', 16, 2); // مثبت یا منفی
          $table->text('notes')->nullable();
          $table->timestamp('traded_at')->nullable();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
