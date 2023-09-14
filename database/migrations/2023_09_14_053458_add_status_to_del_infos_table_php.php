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
        Schema::table('del_infos', function (Blueprint $table) {
            //
            $table->integer('status')->nullable()->default(1)->comment('1:已付款/2:未付款');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('del_infos_table_php', function (Blueprint $table) {
            //
        });
    }
};
