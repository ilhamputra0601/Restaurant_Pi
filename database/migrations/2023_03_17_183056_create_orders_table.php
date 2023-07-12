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
            $table->foreignid('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('foodname')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('phone')->nullable();
            $table->string('snapToken')->nullable();
            $table->string('address')->nullable();
            $table->boolean('paid')->default(false);
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
