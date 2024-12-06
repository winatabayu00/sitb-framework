<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'tb_pasien';
    protected $fillable = [
        'pasien',
        'faskes',
        'nama_pasien',
        'alamat_pasien',
        'no_asuransi_pasien',
        'jenis_asuransi_pasien',
        'nik_pasien',
        'status_kewarganegaraan',
        'paspor',
        'kewarganegaraan',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id',
        'kode_pos',
        'no_telepon',
        'jenis_no_telepon',
        'surat_elektronik',
        'gol_darah',
        'nama_ayah',
        'nama_ibu',
        'nama_pasangan',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'tgl_kematian',
        'agama',
        'pendidikan_terakhir',
        'status_pernikahan',
        'jenis_pekerjaan',
        'suku',
        'ket_identitas_pasien'
    ];


    

}
