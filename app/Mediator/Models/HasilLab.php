<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class HasilLab extends Model implements HasMediatorLog
{
    use InteractsWithMediatorLog;

    protected $table = 'tb_hasil_labs';

    protected $fillable = [
        'id',
        'jenis_pemeriksaan',
        'pelayanan',
        'kunjungan',
        'pasien',
        'faskes',
        'tgl_contoh_uji',
        'kondisi_contoh_uji',
        'tanggal_daftar',
        'pemeriksa',
        'contoh_uji',
        'contoh_uji_lain',
        'tanggal_hasil',
        'no_reg_hasil',
        'hasil',
        'catatan',
        'tcm_xdr',
        'xdr_mtb',
        'xdr_h',
        'xdr_ht',
        'xdr_fq',
        'xdr_fqt',
        'xdr_amk',
        'xdr_km',
        'xdr_cm',
        'xdr_eto',
        'lpa_lini1',
        'lini1_mtb',
        'lini1_inh',
        'lini1_inhh',
        'lini1_rif',
        'lini1_eto',
        'lini1_pto',
        'lpa_lini2',
        'lini2_mtb',
        'lini2_lfx',
        'lini2_mfx',
        'lini2_mfx_dt',
        'lini2_amk',
        'lini2_km',
        'lini2_cm',
        'biakan_metode',
        'kepekaan_ht',
        'kepekaan_h',
        'kepekaan_km',
        'kepekaan_cm',
        'kepekaan_lfx',
        'kepekaan_mfxt',
        'kepekaan_mfx',
        'kepekaan_amk',
        'kepekaan_eto',
        'kepekaan_lzd',
        'kepekaan_dlm',
        'kepekaan_cfz',
        'kepekaan_bdq',
        'kepekaan_ofl',
        'kepekaan_s',
        'kepekaan_e',
        'kepekaan_z',
        'bdmax_mtb',
        'bdmax_rif',
        'bdmax_inh',
        'bdmax_katg',
        'bdmax_apr',
        'pcr_mtb',
        'pcr_rif',
        'pcr_inh',
        'pcr_ntm',
        'pcr_katg',
        'pcr_apr',
        'penerima',
        'ID_DIAGNOSTICREPORT_SATUSEHAT',
    ];

}
