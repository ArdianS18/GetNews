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
        Schema::create('payment_advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisement_id');
            $table->enum('payment_method', ['bri', 'mandiri', 'bca', 'bni', 'bsi', 'gopay', 'ovo', 'dana', 'indomaret', 'alfamart']);
            $table->string('voucher')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_advertisements');
    }
};
