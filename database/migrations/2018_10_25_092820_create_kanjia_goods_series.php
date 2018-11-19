<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjiaGoodsSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wangxun_kanjia_goods_series', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id');
            $table->string('series_ids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wangxun_kanjia_goods_series');
    }
}
