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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('invoice_id'); // Foreign key to invoice table
            $table->string('item_name');
            $table->enum('item_type', ['goods', 'services']);
            $table->string('barcode')->unique();  // Barcode field
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->decimal('total', 8, 2); // quantity * price
            $table->timestamps();

            // Set up the foreign key (optional)
            // $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
