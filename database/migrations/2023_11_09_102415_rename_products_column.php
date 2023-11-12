<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->dropColumn('mark');
            $table->dropColumn('model');
            $table->dropColumn('color');
        });
        Schema::table('products', function(Blueprint $table) {
            $table->foreignId('brand_id');
            $table->foreignId('model_id');
            $table->foreignId('color_id');
        });
    }


    public function down()
    {
        
    }

};