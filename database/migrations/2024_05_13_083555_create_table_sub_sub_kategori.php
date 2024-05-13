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
        Schema::create('table_sub_sub_kategori', function (Blueprint $table) {
            $table->id('id_subSubKategori');
            $table->unsignedBigInteger('id_subKategori');
            $table->string('nama_subSubKategori')->unique();
            $table->timestamps();

            $table->foreign('id_subKategori')->references('id_subKategori')->on('table_sub_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_sub_sub_kategori');
    }
};
