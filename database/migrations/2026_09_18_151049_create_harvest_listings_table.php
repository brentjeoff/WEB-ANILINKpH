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
        Schema::create('harvest_listings', function (Blueprint $table) {
            $table->id();
             
            // Connect harvest listing to the user/farmer
            $table->foreignId('farmer_id')
                  ->constrained('users')
                  ->onDelete('cascade');

                  $table->string('product_name');
    $table->string('category');
    $table->string('farming_method')->nullable();
    $table->text('description')->nullable();

    $table->decimal('price', 10, 2);
    $table->integer('quantity')->unsigned();
    $table->string('unit');

    $table->string('image')->nullable();

    $table->boolean('farm_pickup')->default(false);
    $table->boolean('local_delivery')->default(false);

    $table->enum('status', [
        'Available',
        'Sold',
        'Draft',
        'Expired'
    ])->default('Available');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvest_listings');
    }
};
