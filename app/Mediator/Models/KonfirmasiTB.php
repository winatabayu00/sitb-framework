<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiTB extends Model
{
    protected $table = 'tb_konfirmasi';
    protected $fillable = [
        'pasien',
        'faskes',
        'pelayanan',
        'kunjungan',
        'tgl_daftar',
        'tinggi_badan',
        'imunisasi_bcg_id',
        'asal_rujukan_id',
        'tipe_pasien_id',
        'icd_id',
        'skoring_tbc_anak',
        'pemeriksaan_uji_tuberkulin_id',
        'uji_tuberkulin_id',
        'klasifikasi_uji_id'
      
    ];


    

}
