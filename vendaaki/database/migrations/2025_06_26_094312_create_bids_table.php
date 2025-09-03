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
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_id')->constrained('ads')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Utilizador que fez o lance
            $table->decimal('amount', 10, 2);
            $table->boolean('is_auto_bid')->default(false); // Se foi um lance automático (proxy bid)
            $table->decimal('max_auto_bid_amount', 10, 2)->nullable(); // Valor máximo para proxy bid
            $table->timestamps();

            // Index para otimizar consultas por ad_id e user_id
            $table->index(['ad_id', 'created_at']);
            $table->index(['user_id', 'ad_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
