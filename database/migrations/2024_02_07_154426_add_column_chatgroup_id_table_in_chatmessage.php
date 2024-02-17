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
        Schema::table('chatmessages', function (Blueprint $table) {
            $table->bigInteger('chatgroup_id')->unsigned()->default(null)->comment('ссылка на группу чата')->after('message');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chatmessage', function (Blueprint $table) {
            $table->dropColumn('chatgroup_id');
        });
    }
};
