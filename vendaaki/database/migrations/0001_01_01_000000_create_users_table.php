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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome completo ou da loja
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username', 100)->unique()->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('nif', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->default('Portugal');
            $table->string('profile_image_path')->nullable();
            $table->string('profile_banner_path')->nullable();
            $table->text('profile_description')->nullable();
            $table->enum('profile_theme_preference', ['light', 'dark', 'system'])->default('system');
            $table->boolean('is_professional')->default(false);
            $table->timestamp('identity_verified_at')->nullable();
            $table->string('identity_document_path')->nullable();
            $table->enum('status', ['active', 'inactive', 'suspended', 'pending_verification'])->default('pending_verification');
            $table->timestamp('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
