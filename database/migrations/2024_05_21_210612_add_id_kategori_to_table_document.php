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
        Schema::table('table_document', function (Blueprint $table) {
            $table->unsignedBigInteger('id_subKategori');
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
        Schema::table('table_documents', function (Blueprint $table) {
            //
        });
    }
};
