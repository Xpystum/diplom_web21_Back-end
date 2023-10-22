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
        Schema::create('tovars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->string('img_src')->comment('ссылка на img');
            $table->integer('price')->unsigned();
            $table->integer('old_price')->unsigned();
            $table->string('engine')->comment('Двигатель');
            $table->string('power')->comment('Мощность');
            $table->string('transmission')->comment('Коробка передач');
            $table->string('drive_unit')->comment('Привод');
            $table->string('color')->comment('Цвет');
            $table->string('steering_wheel')->nullable()->comment('Руль (левый/правый)');
            $table->string('generation')->nullable()->comment('Поколение');
            $table->string('equipment')->nullable()->comment('Комплектация');
            $table->string('vin')->nullable();
            $table->text('description')->nullable()->comment('Описание');
            $table->string('city')->comment('Город продажи');
            $table->boolean('state_new_old')->default(0)->comment('новый или старый');
            $table->integer('categoryID')->nullable()->comment('Изменить ключ на внешний (категория товара)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tovars');
    }
};
