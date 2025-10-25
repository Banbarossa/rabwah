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
        Schema::create('midtran_notifications', function (Blueprint $table) {

            $table->id();
            $table->foreignId('donation_id')->constrained()->cascadeOnDelete();
            $table->string('transaction_status')->nullable();
            $table->string('fraud_status')->nullable();
            $table->json('payload')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midtran_notifications');
    }
};
