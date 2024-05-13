<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sub_kategori', function (Blueprint $table) {
            $table->id('id_subKategori');
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_subKategori')->unique();
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('table_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_sub_kategori');
    }
};
