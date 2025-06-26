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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Vendedor
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict'); // Categoria principal
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->enum('condition', ['new', 'used_like_new', 'used_good', 'used_fair']);
            $table->enum('ad_type', ['fixed_price', 'auction', 'hybrid']);
            $table->decimal('price', 10, 2)->nullable(); // Preço para venda a preço fixo ou preço "Comprar Já" no híbrido
            $table->decimal('starting_bid', 10, 2)->nullable(); // Lance inicial para leilões
            $table->decimal('current_bid', 10, 2)->nullable(); // Lance atual (para leilões)
            $table->decimal('bid_increment', 8, 2)->nullable()->default(1.00); // Incremento mínimo para leilões
            $table->decimal('buy_now_price', 10, 2)->nullable(); // Preço para "Comprar Já" em leilões híbridos
            $table->timestamp('auction_ends_at')->nullable(); // Data e hora de fim do leilão
            $table->string('location_city', 100)->nullable();
            $table->string('location_postal_code', 20)->nullable();
            $table->boolean('accepts_pickup')->default(true);
            $table->decimal('shipping_cost', 8, 2)->nullable();
            $table->enum('status', ['active', 'pending_approval', 'sold', 'expired', 'draft', 'rejected', 'deleted'])->default('draft');
            $table->unsignedInteger('views_count')->default(0);
            $table->timestamp('is_promoted_until')->nullable();
            $table->boolean('promoted_by_share')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable(); // Data de expiração do anúncio (se aplicável)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
