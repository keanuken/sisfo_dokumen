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
        Schema::create('table_document', function (Blueprint $table) {
            $table->id('id_dokumen');
            $table->unsignedBigInteger('id_subSubKategori')->nullable();
            $table->string('nama_dokumen');
            $table->string('judul_dokumen');
            $table->integer('versi_dokumen');
            $table->string('tautan_dokumen');
            $table->string('image_preview')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_subSubKategori')->references('id_subSubKategori')->on('table_sub_sub_kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_document');
    }
};
