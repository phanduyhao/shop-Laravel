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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->longText('thumb');
            $table->string('nameProduct',255);
            $table->float('price');
            $table->integer('quanity');
            $table->float('subtotal');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('Products');
            $table->unsignedBigInteger('addresses_id');
            $table->foreign('addresses_id')->references('id')->on('addresses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

