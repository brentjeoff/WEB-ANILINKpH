<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('buyer_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('farmer_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('harvest_listing_id')
                ->constrained('harvest_listings')
                ->cascadeOnDelete();

            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('rating');

            $table->text('comment')->nullable();

            $table->timestamps();

            // Prevent the same buyer from reviewing
            // the same order more than once.
            $table->unique([
                'buyer_id',
                'order_id',
                'harvest_listing_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};