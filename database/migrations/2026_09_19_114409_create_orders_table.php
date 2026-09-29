<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Buyer who placed the order
            $table->foreignId('buyer_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Farmer who owns the listing
            $table->foreignId('farmer_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Product being ordered
            $table->foreignId('harvest_listing_id')
                ->constrained('harvest_listings')
                ->onDelete('cascade');

            // Order information
            $table->string('order_number')->unique();

            $table->integer('quantity')->unsigned();

            // Save the price at the time the order was placed
            $table->decimal('unit_price', 10, 2);

            $table->decimal('total_price', 10, 2);

            // Farm Pickup or Local Delivery
            $table->enum('fulfillment_method', [
                'Farm Pickup',
                'Local Delivery'
            ]);

            // Order status
            $table->enum('status', [
                'Pending',
                'Confirmed',
                'Shipped',
                'Delivered',
                'Cancelled'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};