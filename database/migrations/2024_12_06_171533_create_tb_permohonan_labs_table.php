<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPermohonanLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_permohonan_labs', function (Blueprint $table) {
            $table->id();
            $table->string('pelayanan')->nullable();
            $table->string('kunjungan')->nullable();
            $table->string('pasien')->nullable();
            $table->string('faskes')->nullable();
            $table->string('no_sediaan', 40);
            $table->string('lokasi_anatomi', 45)->nullable();
            $table->dateTime('tanggal_permohonan');
            $table->string('pengirim', 45)->nullable();
            $table->string('alasan', 45)->nullable();
            $table->string('faskes_tujuan', 45)->nullable();
            $table->dateTime('tanggal_pengambilan')->nullable();
            $table->dateTime('tanggal_pengiriman')->nullable();
            $table->string('jenis_pemeriksaan', 45)->nullable();
            $table->string('followup_ke', 45)->nullable();
            $table->string('periksa_ulang_ke', 45)->nullable();
            $table->string('contoh_uji', 45)->nullable();
            $table->string('contoh_uji_lain', 45)->nullable();
            $table->string('jenis_sample', 45)->nullable();
            $table->string('jenis_sample_lain', 45)->nullable();
            $table->string('nomor_permohonan', 45)->nullable();
            $table->string('ID_SERVICEREQUEST_SATUSEHAT', 45)->nullable();
            $table->string('ID_SPECIMEN_SATUSEHAT', 45)->nullable();
            $table->timestamps(); // created_at and updated_at
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
        Schema::dropIfExists('tb_permohonan_labs');
    }
}
