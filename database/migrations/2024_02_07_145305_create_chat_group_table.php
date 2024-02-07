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
        Schema::create('chat_group', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_main_id')->unsigned()
                ->unique()->comment('пользователь товара');
            $table->bigInteger('user_minor_id')->unsigned()
                ->unique()->comment('пользователь observ tovar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_group');
    }
};
