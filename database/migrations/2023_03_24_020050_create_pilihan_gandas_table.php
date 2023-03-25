<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilihanGandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_gandas', function (Blueprint $table) {
            $table->id('id_soal_pilihan');
            $table->bigInteger('id_mapel');
            $table->bigInteger('id_kelas');
            $table->bigInteger('id_user');
            $table->string('soal',100);
            $table->string('opsi',100);
            $table->string('judul_soal',100);
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
        Schema::dropIfExists('pilihan_gandas');
    }
}
