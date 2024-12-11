<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class PermohonanLab extends Model implements HasMediatorLog
{

    use InteractsWithMediatorLog;

    protected $table = 'tb_permohonan_labs';

    // sample status label
    public const BARU = 'baru';
    public const KAMBUH = 'kambuh';
    public const DIOBATI_SETELAH_GAGAL_KATEGORI_1 = 'Diobati setelah gagal kategori 1';
    public const DIOBATI_SETELAH_GAGAL_KATEGORI_2 = 'Diobati setelah gagal kategori 2';
    public const DIOBATI_SETELAH_PUTUS_BEROBAT = 'Diobati setelah putus berobat';
    public const DIOBATI_SETELAH_GAGAL_PENGOBATAN_LINI_2 = 'Diobati setelah gagal pengobatan lini 2';
    public const PERNAH_DIOBATI_TIDAK_DIKETAHUI_HASILNYA = 'Pernah diobati tidak diketahui hasilnya';
    public const TIDAK_DIKETAHUI = 'Tidak diketahui';
    public const LAIN_LAIN = 'Lain-lain';
    public const DIOBATI_SETELAH_GAGAL = 'Diobati setelah gagal';

    /**
     * @param string $statusName
     * @return int
     */
    public static function statusLabelCode(string $statusName): int
    {
        switch ($statusName) {
            case PermohonanLab::BARU:
                $statusCode = 1;
                break;
            case PermohonanLab::KAMBUH:
                $statusCode = 2;
                break;
            case PermohonanLab::DIOBATI_SETELAH_GAGAL_KATEGORI_1:
                $statusCode = 3;
                break;
            case PermohonanLab::DIOBATI_SETELAH_GAGAL_KATEGORI_2:
                $statusCode = 4;
                break;
            case PermohonanLab::DIOBATI_SETELAH_PUTUS_BEROBAT:
                $statusCode = 5;
                break;
            case PermohonanLab::DIOBATI_SETELAH_GAGAL_PENGOBATAN_LINI_2:
                $statusCode = 6;
                break;
            case PermohonanLab::PERNAH_DIOBATI_TIDAK_DIKETAHUI_HASILNYA:
                $statusCode = 7;
                break;
            case PermohonanLab::TIDAK_DIKETAHUI:
                $statusCode = 8;
                break;
            case PermohonanLab::LAIN_LAIN:
                $statusCode = 9;
                break;
            case PermohonanLab::DIOBATI_SETELAH_GAGAL:
                $statusCode = 10;
                break;
            default:
                throw new \InvalidArgumentException('Incorrect status name');
        }
        return $statusCode;
    }

    public static function statusLabels()
    {
        return [
            1 => PermohonanLab::BARU,
            2 => PermohonanLab::KAMBUH,
            3 => PermohonanLab::DIOBATI_SETELAH_GAGAL_KATEGORI_1,
            4 => PermohonanLab::DIOBATI_SETELAH_GAGAL_KATEGORI_2,
            5 => PermohonanLab::DIOBATI_SETELAH_PUTUS_BEROBAT,
            6 => PermohonanLab::DIOBATI_SETELAH_GAGAL_PENGOBATAN_LINI_2,
            7 => PermohonanLab::PERNAH_DIOBATI_TIDAK_DIKETAHUI_HASILNYA,
            8 => PermohonanLab::TIDAK_DIKETAHUI,
            9 => PermohonanLab::LAIN_LAIN,
            10 => PermohonanLab::DIOBATI_SETELAH_GAGAL, 0
        ];
    }

    //status kriteria

    public const TB_SO = 'TB SO';
    public const TB_RO = 'TB RO';

    /**
     * @param string $kriteriaName
     * @return int
     */
    public static function statusKriteriaCode(string $kriteriaName): int
    {
        switch ($kriteriaName) {
            case PermohonanLab::TB_SO:
                $statusCode = 1;
                break;
            case PermohonanLab::TB_RO:
                $statusCode = 2;
                break;
            default:
                throw new \InvalidArgumentException('Incorrect status name');
        }
        return $statusCode;
    }

    public static function statusKriteria(): array
    {
        return [
            1 => PermohonanLab::TB_SO,
            2 => PermohonanLab::TB_RO,
        ];
    }


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
