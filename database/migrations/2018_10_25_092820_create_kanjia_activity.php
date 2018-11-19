<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKanjiaActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanjia_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theme');
            $table->string('brand');
            $table->string('bg_img_url');
            $table->string('desc');
            $table->integer('seller_id');
            $table->string('check_status');
            $table->string('check_remark');
            $table->integer('start_time');
            $table->integer('end_time');
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
        Schema::dropIfExists('kanjia_activity');
    }
}
