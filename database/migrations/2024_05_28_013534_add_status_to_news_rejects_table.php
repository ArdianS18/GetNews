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
        Schema::table('news_rejects', function (Blueprint $table) {
            $table->boolean('status_delete')->default(0);
            $table->enum('status', ['read', 'unread'])->default('unread');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_rejects', function (Blueprint $table) {
            $table->dropColumn('status_delete');
            $table->dropColumn('status');
        });
    }
};
