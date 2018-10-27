<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDndcContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //$connection = config('admin.database.connection') ?: config('database.default');
        //Schema::connection($connection)->create('dndc_contact', function (Blueprint $table) {
        Schema::create('dndc_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->string('author', 50);
            $table->string('plugin_mark', 55);
            $table->string('plugin_name', 55);
            $table->tinyInteger('status');
            $table->string('entrance_route', 50);
            $table->string('oss_url', 200);
            $table->string('img_url', 200);
            $table->string('tag', 50);
            $table->text('error_log');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dndc_contact');
    }
}
