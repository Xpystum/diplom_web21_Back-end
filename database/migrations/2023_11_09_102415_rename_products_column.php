<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        $nameTable = 'products';
        // Schema::table($nameTable, function(Blueprint $table, string $nameTable) {
        //     if (
        //         Schema::hasColumn($nameTable, 'mark') &&
        //         Schema::hasColumn($nameTable, 'model') &&
        //         Schema::hasColumn($nameTable, 'color') 
        //     ){
        //         $table->dropColumn('mark');
        //         $table->dropColumn('model');
        //         $table->dropColumn('color');
        //     }
        // });

         Schema::table('products', function(Blueprint $table) {
            if (Schema::hasColumn('products', 'mark')){
                $table->dropColumn('mark');
            }

            if(Schema::hasColumn('products', 'model')){
                $table->dropColumn('model');
            }

            if(Schema::hasColumn('products', 'color')){
                $table->dropColumn('color');
            }
        });

        Schema::table('products', function(Blueprint $table) {
            $table->foreignId('brand_id')->after('id');
            $table->foreignId('model_id');
            $table->foreignId('color_id');
        });
    }


    public function down()
    {
        
    }

};