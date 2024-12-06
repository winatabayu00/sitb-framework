<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class KasusTB extends Model implements HasMediatorLog
{

    use InteractsWithMediatorLog;

    protected $table = 'tb_kasus';
    protected $fillable = [
        'pelayanan',
        'kunjungan',
        'pasien',
        'faskes',
        'tanggal_hasil',
        'thorax_tanggal',
        'thorax_hasil',
        'thorax_kesan',
        'lokasi_anatomi',
        'hasil_diagnosis',
        'tipe_diagnosis',
        'tindak_lanjut',
        'tempat_pengobatan',
        'dirujuk_ke'
    ];


       /**
     * Relasi ke model Pasien.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien', 'id_pasien'); // 'id' adalah primary key di tabel pasien_m
    }
}
