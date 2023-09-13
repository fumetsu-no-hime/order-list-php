<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('del_infos', function (Blueprint $table) {
            //
            $table->string('phone')->nullable()->default(null)->comment('收件者電話')->change();
            $table->date('date')->nullable()->default(null)->comment('日期')->change();
            $table->string('memo')->nullable()->default(null)->comment('備註')->change();
            $table->string('number')->nullable()->default(null)->comment('訂單編號')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('del_infos', function (Blueprint $table) {
            //
        });
    }
};
