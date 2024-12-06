<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pasiens', function (Blueprint $table) {
            $table->id();
            $table->uuid('pasien')->nullable();
            $table->uuid('faskes')->nullable();
            $table->string('nama_pasien', 45)->nullable();
            $table->string('alamat_pasien', 45)->nullable();
            $table->string('no_asuransi_pasien', 45)->nullable();
            $table->string('jenis_asuransi_pasien', 45)->nullable();
            $table->string('nik_pasien', 45)->nullable();
            $table->string('status_kewarganegaraan', 45)->nullable();
            $table->string('paspor', 45)->nullable();
            $table->string('kewarganegaraan', 45)->nullable();
            $table->integer('provinsi_id')->nullable();
            $table->integer('kabupaten_id')->nullable();
            $table->integer('kecamatan_id')->nullable();
            $table->integer('desa_id')->nullable();
            $table->string('kode_pos', 45)->nullable();
            $table->string('no_telepon', 45)->nullable();
            $table->string('jenis_no_telepon', 45)->nullable();
            $table->string('surat_elektronik', 45)->nullable();
            $table->string('gol_darah', 45)->nullable();
            $table->string('nama_ayah', 45)->nullable();
            $table->string('nama_ibu', 45)->nullable();
            $table->string('nama_pasangan', 45)->nullable();
            $table->string('jenis_kelamin', 45)->nullable();
            $table->string('tempat_lahir', 45)->nullable();
            $table->string('tgl_lahir', 45)->nullable();
            $table->string('tgl_kematian', 45)->nullable();
            $table->string('agama', 45)->nullable();
            $table->string('pendidikan_terakhir', 45)->nullable();
            $table->string('status_pernikahan', 45)->nullable();
            $table->string('jenis_pekerjaan', 45)->nullable();
            $table->string('suku', 45)->nullable();
            $table->string('ket_identitas_pasien', 45)->nullable();
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
        Schema::dropIfExists('tb_pasiens');
    }
}
