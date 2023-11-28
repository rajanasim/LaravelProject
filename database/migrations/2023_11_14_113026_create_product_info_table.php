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
        Schema::create('product_info', function (Blueprint $table) {
            $table->id(); 
                $table->string('product_name');
                $table->string('product_description');
                $table->string('product_price');
                $table->string('product_color');
                $table->string('product_discount');
                $table->string('product_sku')->unique(); 
                $table->string('product_category'); 
                $table->string('product_availablity'); 
                $table->string('product_image');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_info');
    }
};