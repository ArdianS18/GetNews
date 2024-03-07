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
            $table->string('name');
            $table->text('photo');
            $table->text('content');
            $table->text('sinopsis');
            $table->date('upload_date');
            $table->boolean('is_primary')->default(0);
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('sub_category_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('slug')->unique();
            $table->enum('status', ['active', 'nonactive', 'panding', 'primary'])->default('panding');
            $table->string('tags');
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
