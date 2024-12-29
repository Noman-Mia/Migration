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
            $table->id();
            $table->string('title',200);
            $table->string('short-des',500);
            $table->string('price',200);
            $table->string('discount',200);
            $table->string('discount_price',200);
            $table->string('image',200);
            $table->boolean('stock');
            $table->float('star');
            $table->enum('remark',['popular','new','top','special','trending','regular']);

            // f-key
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            
            //relationship
            $table->foreign('category_id')->references('id')->on('categories')
            ->cascadeOnUpdate()->restrictOnDelete();
           

            $table->foreign('brand_id')->references('id')->on('brands')
            ->cascadeOnUpdate()->restrictOnDelete();

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
