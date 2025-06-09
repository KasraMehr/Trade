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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('principal', 16, 2);
            $table->decimal('current_amount', 16, 2);
            $table->decimal('interest_rate', 5, 2);
            $table->string('plan');
            $table->timestamp('started_at')->useCurrent();
            $table->timestamp('last_compounded_at')->nullable();
            $table->enum('status', ['active','completed','cancelled'])->default('active');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
