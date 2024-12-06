<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTerdugaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_terduga', function (Blueprint $table) {
            $table->id();
            $table->string('person_id')->nullable();
            $table->string('no_sediaan')->nullable();
            $table->string('terduga_tb_id');
            $table->string('terduga_ro_id');
            $table->string('tipe_pasien_id');
            $table->string('status_dm_id')->nullable();
            $table->string('status_hiv_id')->nullable();
            $table->string('imunisasi_bcg_id')->nullable();
            $table->string('status_tb')->nullable();
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
        Schema::dropIfExists('tb_terduga');
    }
}
