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
        Schema::table('chat_group', function (Blueprint $table) {
            $table->renameColumn('user_main_id', 'owner_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat_group', function (Blueprint $table) {
            $table->renameColumn('owner_id', 'user_main_id');
        });
    }
};
