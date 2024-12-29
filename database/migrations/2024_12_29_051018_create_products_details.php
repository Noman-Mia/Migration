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
        Schema::create('products_details', function (Blueprint $table) {
            $table->id();
            $table->string('img1',200);
            $table->string('img2',200);
            $table->string('img3',200);
            $table->string('img4',200);
            $table->longText('des');
            $table->string('color',200);
            $table->string('size',200);

            //f-key
            $table->unsignedBigInteger('product_id');

            //relationship
            $table->foreign('product_id')->references('id')->on('products')
            ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_details');
    }
};
