<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class PermohonanLab extends Model implements HasMediatorLog
{

    use InteractsWithMediatorLog;

    protected $table = 'tb_permohonan_lab';
    protected $fillable = [
        'pasien',
        'pelayanan',
        'kunjungan',
        'faskes',
        'no_sediaan',
        'lokasi_anatomi',
        'pengirim',
        'tanggal_permohonan',
        'pengirim',
        'alasan',
        'faskes_tujuan',
        'tanggal_pengambilan',
        'tanggal_pengiriman',
        'jenis_pemeriksaan',
        'followup_ke',
        'periksa_ulang_ke',
        'contoh_uji',
        'contoh_uji_lain',
        'jenis_sample',
        'jenis_sample_lain',
        'nomor_permohonan',
        'ID_SERVICEREQUEST_SATUSEHAT',
        'ID_SPECIMEN_SATUSEHAT'
    ];


       /**
     * Relasi ke model Pasien.
     */
   

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien', 'id_pasien'); // assuming 'person_id' is the foreign key
    }
}
