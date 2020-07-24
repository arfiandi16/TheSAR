<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id_rating');
            $table->timestamps();
            $table->float('jumlah'); 
            $table->bigInteger('id_home')->unsigned()->nullable();
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->foreign('id_home')->references('id_home')->on('home_pages');
            $table->foreign('id_user')->references('id_user')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
