<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaduanPengobatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_paduan_pengobatan', function (Blueprint $table) {
            $table->id();
            $table->string('pelayanan')->nullable();
            $table->string('kunjungan')->nullable();
            $table->string('pasien')->nullable();
            $table->string('faskes')->nullable();
            $table->dateTime('tgl_mulai_pengobatan')->nullable();
            $table->double('berat_badan')->nullable();

            $table->string('paduan_oat_id')->nullable();
            $table->string('bentuk_oat_id')->nullable();
            $table->string('paduan_pengobatan_id')->nullable();


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
        Schema::dropIfExists('paduan_pengobatan');
    }
}
