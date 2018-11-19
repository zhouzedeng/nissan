<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjiaCut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanjia_cut', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('activity_id');
            $table->integer('goods_id');
            $table->integer('user_id');
            $table->integer('already_cut_num');
            $table->integer('is_finish');
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
        Schema::dropIfExists('kanjia_cut');
    }
}
