<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjiaGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wangxun_kanjia_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_id');
            $table->string('goods_name');
            $table->integer('goods_price');
            $table->string('goods_img');
            $table->integer('coupon_id');
            $table->integer('coupon_price');
            $table->string('card_code');
            $table->integer('card_id');
            $table->string('coupon_title');
            $table->string('coupon_desc');
            $table->integer('need_cut_num');
            $table->integer('created_at');
            $table->integer('updated_at');
            $table->integer('deleted_at')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wangxun_kanjia_goods');
    }
}
