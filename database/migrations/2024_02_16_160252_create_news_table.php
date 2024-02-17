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
            $table->id();
            $table->string('name');
            $table->text('photo');
            $table->text('content');
            $table->string('sinopsis');
            $table->foreignId('sub_categories_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('slug');
            $table->enum('status', ['active', 'nonactive']);
            // $table->foreignId('tags_id')->constrained();
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
