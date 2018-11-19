<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjiaCutVisitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wangxun_kanjia_cut_visitor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cut_id');
            $table->integer('visitor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wangxun_kanjia_cut_visitor');
    }
}
