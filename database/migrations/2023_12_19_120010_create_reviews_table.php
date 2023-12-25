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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id()->comment('id Отзыва');
            $table->unsignedBigInteger('user_id')->comment('id Пользователя');
            $table->string('main_img')->comment('Путь основной Картинки')->nullable();
            $table->decimal('raiting', $precision = 5, $scale = 1)->comment('оценка отзыва');
            
            $table->unsignedBigInteger('brand_id')->comment('id Бренда');
            $table->unsignedBigInteger('model_id')->comment('id Модели');
            $table->string('steering_wheel')->comment('Руль (Левый/правый)');
            $table->unsignedBigInteger('body_type_id')->comment('id Кузова')->nullable();
            $table->unsignedInteger('year')->comment('Год выпуска')->nullable();
            $table->decimal('engine_capacity', $precision = 10, $scale = 1)->comment('объем двигателя')->nullable();
            $table->integer('power')->comment('Мощность');
            $table->unsignedBigInteger('fuel_id')->comment('id Топлива');
            $table->unsignedBigInteger('transmission_id')->comment('id Трансмиссия')->nullable();
            $table->unsignedBigInteger('drive_unit_id')->comment('id Привода')->nullable();

            $table->string('sale_year')->comment('год продажи');
            $table->string('mileage')->comment('пробег');

            $table->text('review')->comment('Отзыв');
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
