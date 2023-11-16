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
        Schema::create('img_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->comment('id товара');
            $table->string('resource')->comment('путь до картинки');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('img_products');
    }
};
