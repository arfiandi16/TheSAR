<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->bigIncrements('id_home');
            $table->string('judul');
            $table->string('gambar');
            $table->date('waktu_upload');
            $table->string('uploader');
            $table->bigInteger('id_status')->unsigned();
            $table->text('isi_berita');
            $table->string('alamat_maps');
            $table->integer('banyak_komentar');
            $table->timestamps();

            $table->foreign('id_status')->references('id_status')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_pages');
    }
}
