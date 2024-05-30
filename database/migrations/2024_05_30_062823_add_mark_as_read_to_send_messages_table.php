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
        Schema::table('send_messages', function (Blueprint $table) {
            $table->timestamp('mark_as_read')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('send_messages', function (Blueprint $table) {
            $table->dropUnique('mark_as_read');
        });
    }
};
