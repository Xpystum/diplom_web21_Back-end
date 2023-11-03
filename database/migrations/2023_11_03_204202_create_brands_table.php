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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string("img_light")->nullable();
            $table->string("img_dark")->nullable();
            $table->string("name");
            $table->string("alias")->nullable();
            $table->boolean('popular');
            $table->float('type')->comment("1-легковой, 2-и тот и другой, 3-грузовой")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
