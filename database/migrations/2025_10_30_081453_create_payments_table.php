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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->morphs('payable'); // payable_id + payable_type
            $table->string('order_id')->unique();
            $table->string('payment_via')->default('midtrans');
            $table->string('payment_method')->nullable();
            $table->string('snap_token')->nullable();
            $table->bigInteger('amount', );
            $table->enum('status', ['pending','challenge','settlement','denied','expired','canceled','unknown','success'])->default('pending');
            $table->json('meta')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
