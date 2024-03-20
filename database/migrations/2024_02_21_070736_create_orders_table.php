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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('productId')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('userId')->references('id')->on('users')->nullable();
            $table->integer('jumlahBeli');
            $table->integer('totalPembelian');
            $table->string('alamatTujuan')->nullable();
            $table->string('status');
            $table->string('estimasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
