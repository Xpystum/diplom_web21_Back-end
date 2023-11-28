<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('model')->comment('Модель например x7')->after('id');
            $table->string('mark')->comment('Марка или бренд например BMW')->after('Model');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->comment('Название автомобиля');
            $table->dropColumn('model')->comment('Модель например x7')->after('id');
            $table->dropColumn('mark')->comment('Марка или бренд например BMW')->after('Model');
        });
    }
};
