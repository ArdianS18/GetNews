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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained();
            $table->enum('type' , ['foto', 'vidio']);
            $table->enum('page', ['dashboard','news_post','sub_category']);
            $table->enum('position', ['full_horizontal', 'horizontal', 'vertikal']);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('url');
            $table->string('photo');
            $table->enum('status', ['pending', 'reject', 'accepted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
