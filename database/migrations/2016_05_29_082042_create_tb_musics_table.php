<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_musics', function (Blueprint $table) {
            $table->increments('mid');
            $table->string('music_title');
            $table->string('music_location');
            $table->integer('singer_id')->unsigned;
            $table->integer('production_id')->unsigned;
            $table->integer('vol')->unsigned;
            $table->date('created_at');
            $table->date('updated_at');

            $table->foreign('singer_id')->references('sid')->on('tb_singer');
            $table->foreign('production_id')->references('pid')->on('tb_production');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tb_musics');
    }
}
