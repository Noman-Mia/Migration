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
        Schema::create('product_wishes', function (Blueprint $table) {
            $table->id();
            //f-key
            $table->string('email');
            $table->unsignedBigInteger('product_id');

            //relationship
            $table->foreign('email')->references('email')
            ->on('profiles')->cascadeOnUpdate()->restrictOnDelete();

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
        Schema::dropIfExists('product_wishes');
    }
};
