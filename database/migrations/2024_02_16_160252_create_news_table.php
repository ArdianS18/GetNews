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
        Schema::create('news', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('name')->nullable()->default('-');
            $table->text('photo')->nullable();
            $table->longText('content')->nullable();
            $table->timestamp('upload_date')->nullable();
            $table->boolean('is_primary')->default(0);
            $table->string('slug')->unique()->nullable()->default('-');
            $table->enum('status', ['active', 'nonactive', 'panding', 'primary', 'draft'])->default('panding');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
