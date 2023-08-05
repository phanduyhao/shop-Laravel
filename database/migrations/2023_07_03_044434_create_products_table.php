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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('Title',255);
            $table->string('thumb', 10000);
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('cate_id')->on('cate');
            $table->text('description');
            $table->longText('content');
            $table->float('price');
            $table->float('discount');
            $table->string('slug',255);   // Link
            $table->integer('active');
            $table->integer('ishot');
            $table->integer('isnewfeed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');

    }
};
