<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kasus', function (Blueprint $table) {
            $table->id();
            $table->string('pelayanan')->nullable();
            $table->string('kunjungan')->nullable();
            $table->string('pasien')->nullable();
            $table->string('faskes')->nullable();
            $table->dateTime('tanggal_hasil')->nullable();
            $table->dateTime('thorax_tanggal')->nullable();
            $table->string("thorax_hasil")->nullable();
            $table->string("thorax_kesan")->nullable();
            $table->string("lokasi_anatomi")->nullable();
            $table->string("hasil_diagnosis")->nullable();
            $table->string("tipe_diagnosis")->nullable();
            $table->string("tindak_lanjut")->nullable();
            $table->string("tempat_pengobatan")->nullable();
            $table->string("dirujuk_ke")->nullable();
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
        Schema::dropIfExists('diagnosis');
    }
}
