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
        Schema::create('del_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable()->default('')->comment('收件者姓名');
            $table->string('address')->nullable()->default('')->comment('地址');
            $table->date('date')->nullable()->comment('日期');
            $table->integer('phone')->nullable()->comment('收件者電話');
            $table->text('desc')->nullable()->default('')->comment('備註');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('del_infos');
    }
};
