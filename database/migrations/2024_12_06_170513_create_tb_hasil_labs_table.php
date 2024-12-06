<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHasilLabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hasil_labs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pemeriksaan', 45)->nullable();
            $table->uuid('pelayanan')->nullable();
            $table->uuid('kunjungan')->nullable();
            $table->uuid('pasien')->nullable();
            $table->uuid('faskes')->nullable();
            $table->dateTime('tgl_contoh_uji')->nullable();
            $table->string('kondisi_contoh_uji', 45)->nullable();
            $table->dateTime('tanggal_daftar')->nullable();
            $table->string('pemeriksa', 45)->nullable()->comment('dokter pemeriksa');
            $table->string('contoh_uji', 45)->nullable();
            $table->string('contoh_uji_lain', 45)->nullable();
            $table->dateTime('tanggal_hasil')->nullable();
            $table->string('no_reg_hasil', 45)->nullable();
            $table->string('hasil', 45)->nullable();
            $table->string('catatan', 128)->nullable();
            $table->string('tcm_xdr', 20)->nullable();
            $table->string('xdr_mtb', 20)->nullable();
            $table->string('xdr_h', 20)->nullable();
            $table->string('xdr_ht', 20)->nullable();
            $table->string('xdr_fq', 20)->nullable();
            $table->string('xdr_fqt', 20)->nullable();
            $table->string('xdr_amk', 20)->nullable();
            $table->string('xdr_km', 20)->nullable();
            $table->string('xdr_cm', 20)->nullable();
            $table->string('xdr_eto', 20)->nullable();
            $table->string('lpa_lini1', 20)->nullable();
            $table->string('lini1_mtb', 20)->nullable();
            $table->string('lini1_inh', 20)->nullable();
            $table->string('lini1_inhh', 20)->nullable();
            $table->string('lini1_rif', 20)->nullable();
            $table->string('lini1_eto', 20)->nullable();
            $table->string('lini1_pto', 20)->nullable();
            $table->string('lpa_lini2', 20)->nullable();
            $table->string('lini2_mtb', 20)->nullable();
            $table->string('lini2_lfx', 20)->nullable();
            $table->string('lini2_mfx', 20)->nullable();
            $table->string('lini2_mfx_dt', 20)->nullable();
            $table->string('lini2_amk', 20)->nullable();
            $table->string('lini2_km', 20)->nullable();
            $table->string('lini2_cm', 20)->nullable();
            $table->string('biakan_metode', 20)->nullable();
            $table->string('kepekaan_ht', 20)->nullable();
            $table->string('kepekaan_h', 20)->nullable();
            $table->string('kepekaan_km', 20)->nullable();
            $table->string('kepekaan_cm', 20)->nullable();
            $table->string('kepekaan_lfx', 20)->nullable();
            $table->string('kepekaan_mfxt', 20)->nullable();
            $table->string('kepekaan_mfx', 20)->nullable();
            $table->string('kepekaan_amk', 20)->nullable();
            $table->string('kepekaan_eto', 20)->nullable();
            $table->string('kepekaan_lzd', 20)->nullable();
            $table->string('kepekaan_dlm', 20)->nullable();
            $table->string('kepekaan_cfz', 20)->nullable();
            $table->string('kepekaan_bdq', 20)->nullable();
            $table->string('kepekaan_ofl', 20)->nullable();
            $table->string('kepekaan_s', 20)->nullable();
            $table->string('kepekaan_e', 20)->nullable();
            $table->string('kepekaan_z', 20)->nullable();
            $table->string('bdmax_mtb', 20)->nullable();
            $table->string('bdmax_rif', 20)->nullable();
            $table->string('bdmax_inh', 20)->nullable();
            $table->string('bdmax_katg', 20)->nullable();
            $table->string('bdmax_apr', 20)->nullable();
            $table->string('pcr_mtb', 20)->nullable();
            $table->string('pcr_rif', 20)->nullable();
            $table->string('pcr_inh', 20)->nullable();
            $table->string('pcr_ntm', 20)->nullable();
            $table->string('pcr_katg', 20)->nullable();
            $table->string('pcr_apr', 20)->nullable();
            $table->string('penerima')->nullable();
            $table->string('ID_DIAGNOSTICREPORT_SATUSEHAT', 40)->nullable();
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
        Schema::dropIfExists('tb_hasil_labs');
    }
}
