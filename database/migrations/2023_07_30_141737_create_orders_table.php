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
            // $table->string('order_code')->unique();
            $table->unsignedBigInteger('userID')->nullable(); // Có thể chứa null
            $table->string('firstName', 255)->nullable(); // Có thể chứa null
            $table->string('lastName', 255)->nullable(); // Có thể chứa null
            $table->string('company', 255)->nullable(); // Có thể chứa null
            $table->string('country', 255)->nullable(); // Có thể chứa null
            $table->longText('street_add')->nullable(); // Có thể chứa null
            $table->longText('street_add2')->nullable(); // Có thể chứa null
            $table->text('town')->nullable(); // Có thể chứa null
            $table->text('state')->nullable(); // Có thể chứa null
            $table->text('zip')->nullable(); // Có thể chứa null
            $table->text('phone')->nullable(); // Có thể chứa null
            $table->text('email')->nullable(); // Có thể chứa null
            $table->string('product', 10000)->nullable(); // Có thể chứa null
            $table->text('shipType')->nullable(); // Có thể chứa null
            $table->string('payMethod', 255)->nullable(); // Có thể chứa null
            $table->string('total', 255)->nullable(); // Có thể chứa null
            $table->dateTime('orderDate')->nullable(); // Có thể chứa null
            $table->string('status',255)->nullable(); // Có thể chứa null
            $table->binary('canceled')->nullable(); // Có thể chứa null
            $table->binary('paid')->nullable(); // Có thể chứa null
            $table->dateTime('payDate')->nullable(); // Có thể chứa null
            $table->timestamps();
            $table->foreign('userID')->references('id')->on('users');
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
