<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTBKonfirmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_konfirmasi', function (Blueprint $table) {
            $table->id();
            $table->string('pelayanan')->nullable();
            $table->string('kunjungan')->nullable();
            $table->string('pasien')->nullable();
            $table->string('faskes')->nullable();
            $table->dateTime('tgl_daftar')->nullable();
            $table->double('tinggi_badan')->nullable();
            $table->string('imunisasi_bcg_id')->nullable();
            $table->string('asal_rujukan_id')->nullable();
            $table->string('tipe_pasien_id')->nullable();
            $table->string('icd_id')->nullable();
            $table->string('skoring_tbc_anak')->nullable();
            $table->string('pemeriksaan_uji_tuberkulin_id')->nullable();
            $table->string('uji_tuberkulin_id')->nullable();
            $table->string('klasifikasi_uji_id')->nullable();
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
        Schema::dropIfExists('t_b_konfirmasi');
    }
}
