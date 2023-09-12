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
        Schema::create('order_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('img_path')->nullable()->default('')->comment('商品圖片');
            $table->string('product_name')->nullable()->default('')->comment('商品名稱');
            $table->text('desc')->nullable()->comment('描述');
            $table->integer('qty')->nullable()->comment('商品數量');
            $table->integer('price')->nullable()->comment('金額');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_infos');
    }
};
