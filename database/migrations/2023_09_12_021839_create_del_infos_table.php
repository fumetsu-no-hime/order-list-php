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
            $table->bigInteger('user_id')->nullable()->comment('擁有者id');
            $table->string('name')->nullable()->default('')->comment('收件者姓名');
            $table->string('address')->nullable()->default('')->comment('收件者地址');
            $table->date('date')->nullable()->comment('日期');
            $table->integer('phone')->nullable()->comment('收件者電話');
            $table->text('memo')->nullable()->comment('備註');
            $table->string('number')->nullable()->default('')->comment('訂單編號');
            $table->integer('payment')->nullable()->comment('1:臨櫃匯款/2:線上付款');
            $table->integer('subtotal')->nullable()->comment('總金額');
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
