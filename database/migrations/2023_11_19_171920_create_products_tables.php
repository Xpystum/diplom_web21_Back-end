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
            $table->unsignedBigInteger('brand_id')->comment('id Бренда');
            $table->unsignedBigInteger('model_id')->comment('id Модели');
            $table->unsignedBigInteger('color_id')->comment('id Цвета');
            $table->unsignedBigInteger('fuel_id')->comment('id Топлива');
            $table->unsignedBigInteger('body_type_id')->comment('id Кузова')->nullable();
            $table->unsignedBigInteger('transmission_id')->comment('id Коробки Передач')->nullable();
            $table->unsignedBigInteger('drive_unit_id')->comment('id Привода')->nullable(); 
            $table->unsignedBigInteger('category_id')->comment('id категории')->nullable();
            $table->unsignedBigInteger('organisation_id')->comment('id Организации (Собственик, Салон)')->nullable();

            

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
            
            
            
            
            
            
            
            
            // $table->foreign('brand_id')->references('id')->on('brands');
            // $table->foreign('model_id')->references('id')->on('models');
            // $table->foreign('color_id')->references('id')->on('color');
            // $table->foreign('fuel_id')->references('id')->on('fuel');
            // $table->foreign('body_type_id')->references('id')->on('body_type');
            // $table->foreign('transmission_id')->references('id')->on('transmission');
            // $table->foreign('drive_unit_id')->references('id')->on('drive_unit'); 
            // $table->foreign('category_id')->references('id')->on('category_products');
            // $table->foreign('organisation_id')->references('id')->on('organisation');
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
