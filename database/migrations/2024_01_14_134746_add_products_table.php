<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->integer('moderation_status_id');
            $table->integer('looked')->comment("просмотров")->default(0);
            $table->dateTime('raising')->nullable()->comment("повышение до:");
            $table->dateTime('attachment')->nullable()->comment("закреплен до:");
            $table->dateTime('special_accommodation')->nullable()->comment("в карусели до:");
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('looked');
            $table->dropColumn('raising');
            $table->dropColumn('attachment');
            $table->dropColumn('special_accommodation');
        });
    }
};
