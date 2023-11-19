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
            $table->foreignId('brand_id')->comment('id Бренда')->references('id')->on('brands');
            $table->foreignId('model_id')->comment('id Модели')->references('id')->on('models');
            $table->foreignId('color_id')->comment('id Цвета')->references('id')->on('color');
            $table->foreignId('fuel_id')->comment('id Топлива')->references('id')->on('fuel');
            $table->foreignId('body_type_id')->comment('id Кузова')->nullable()->references('id')->on('body_type');
            $table->foreignId('transmission_id')->comment('id Коробки Передач')->nullable()->references('id')->on('transmission');
            $table->foreignId('drive_unit_id')->comment('id Привода')->nullable()->references('id')->on('drive_unit'); 
            $table->foreignId('category_id')->comment('id категории')->nullable()->references('id')->on('category_products');
            $table->foreignId('organisation_id')->comment('id Организации (Собственик, Салон)')->nullable()->references('id')->on('organisation');

            $table->string('equipment')->comment('Комлектация')->nullable();
            $table->string('generation')->comment('Поколение')->nullable();
            $table->string('main_img')->comment('Путь основной Картинки')->nullable();
            $table->decimal('engine_capacity', $precision = 10, $scale = 1)->comment('объем двигателя')->nullable();
            $table->integer('power')->comment('Мощность');
            $table->string('steering_wheel')->comment('Руль (Левый/правый)');

            $table->unsignedInteger('year')->comment('Год выпуска')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price')->nullable();
            $table->unsignedInteger('mileage')->comment('Пробег');
            
            
            $table->string('additional')->comment('Дополнительно')->nullable();
            $table->string('city')->comment('город продажи');
            $table->string('vin')->comment('vin - номер')->nullable();
            
            $table->boolean('status')->default(0)->comment('Новый/Старый');
            
            
            
            
            
            // грузовые
            $table->string('wheel_formula')->comment('Колесная Формула 4х2, 6х2..')->nullable();
            $table->integer('load_capacity')->comment('Грузоподъёмность')->nullable();
            $table->string('vin_body')->comment('vin - номер кузова')->nullable();  
            $table->float('body_length')->comment('Длина Кузова')->nullable();
            $table->float('body_volume')->comment('Объём кузова')->nullable();
            $table->integer('weight')->comment('масса')->nullable();
            
            $table->timestamps();

            $table->text('desription')->comment('описание');
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
