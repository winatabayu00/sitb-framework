<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class TerdugaTB extends Model implements HasMediatorLog
{

    use InteractsWithMediatorLog;

    protected $table = 'tb_terduga';
    protected $fillable = [
        'person_id',
        'no_sediaan',
        'terduga_tb_id',
        'terduga_ro_id',
        'tipe_pasien_id',
        'status_dm_id',
        'status_hiv_id',
        'imunisasi_bcg_id',
        'status_tb'
    ];


       /**
     * Relasi ke model Pasien.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'person_id', 'id_pasien'); // 'id' adalah primary key di tabel pasien_m
    }
}
