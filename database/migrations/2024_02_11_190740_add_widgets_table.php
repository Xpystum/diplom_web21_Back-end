<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('widgets', function (Blueprint $table) {
            $table->dropColumn('position');
            $table->dropColumn('status');
            $table->string('position_main')->comment('позиция на главной')->nullable();
            $table->string('status_main')->comment('статус на главной')->nullable();

            $table->string('position_product')->comment('позиция в товаре')->nullable();
            $table->string('status_product')->comment('статус в товаре')->nullable();

            $table->string('position_list_products')->comment('позиция в списке товаров')->nullable();
            $table->string('status_list_products')->comment('статус в списке товаров')->nullable();

            $table->string('position_catalog')->comment('позиция в каталоге')->nullable();
            $table->string('status_catalog')->comment('статус в каталоге')->nullable();

            $table->string('position_client_cabinet')->comment('позиция в личном кабинете')->nullable();
            $table->string('status_client_cabinet')->comment('статус в личном кабинете')->nullable();
        });
    }
    public function down(): void
    {
        Schema::table('widgets', function (Blueprint $table) {
            $table->string('position');
            $table->string('status');
            $table->dropColumn('position_main');
            $table->dropColumn('position_product');
            $table->dropColumn('position_catalog');
            $table->dropColumn('position_client_cabinet');

            $table->dropColumn('status_main');
            $table->dropColumn('status_product');
            $table->dropColumn('status_catalog');
            $table->dropColumn('status_client_cabinet');
        });
    }
};
