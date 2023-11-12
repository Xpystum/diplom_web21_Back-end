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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();

            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price')->nullable();
            $table->unsignedInteger('mileage')->comment('Пробег');

            $table->boolean('status')->default(0)->comment('Новый/Старый');

            $table->string('img_src')->comment('Путь Картинки');
            $table->string('engine')->comment('Двигатель');
            $table->integer('power')->comment('Мощность');
            $table->string('transmission')->comment('Коробка Передач')->nullable();
            $table->string('drive_unit')->comment('Привод')->nullable();    
            $table->string('color')->comment('Цвет');
            $table->string('steering_wheel')->comment('Руль (Левый/правый)')->nullable();
            $table->string('generation')->comment('Поколение')->nullable();
            $table->string('equipment')->comment('Комлектация')->nullable();
            $table->string('vin')->comment('vin - номер')->nullable();
            $table->string('city')->comment('город продажи');

            $table->integer('category_id')->comment('категория (поменять на foregin key)')->nullable();
            
            // грузовые
            $table->string('wheel_formula')->comment('Колесная Формула 4х2, 6х2..')->nullable();
            $table->integer('load_capacity')->comment('Грузоподъёмность')->nullable();
            $table->string('vin_body')->comment('vin - номер кузова')->nullable();  
            $table->float('body_length')->comment('Длина Кузова')->nullable();
            $table->float('body_volume')->comment('Объём кузова')->nullable();
            $table->integer('weight')->comment('масса')->nullable();
            

            $table->text('desription')->comment('описание');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
