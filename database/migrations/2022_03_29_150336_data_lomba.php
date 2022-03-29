<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataLomba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_lomba', function (Blueprint $table) {
            $table->increments('id_lomba');
            $table->unsignedBigInteger('id_user');
            $table->string('judul_lomba', 100);
            $table->string('kategori', 30);
            $table->longText('deskripsi');
            $table->dateTime('tanggal_pembuatan');
            $table->dateTime('tanggal_penutupan');
            $table->string('gambar', 20);
            $table->string('jenis lomba', 15);
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('data_lomba');
    }
}
