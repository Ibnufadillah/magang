<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MataKuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id();
		    $table->string('nama',30);
		    $table->integer('sks');
            $table->unsignedBigInteger('dosen_id')->nullable();
            $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('set null');

        });
        Schema::create('mahasiswa_mata_kuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('mata_kuliah_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_kuliah');
        Schema::dropIfExists('mahasiswa_mata_kuliah');

    }
}