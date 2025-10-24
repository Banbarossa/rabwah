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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_program_id')->nullable()->constrained()->onDelete('set null');
            $table->text('slug');
            $table->text('title');
            $table->text('excerpt');
            $table->longText('content');
            $table->string('thumbnail');
            $table->enum('status',['draft','published','archived'])->default('draft');
            $table->bigInteger('target_amount')->default(0);
            $table->bigInteger('collected_amount')->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
