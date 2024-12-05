<?php

namespace App\Mediator\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mediator\Models\MediatorLog;
use App\Mediator\Models\TerdugaTB;
use App\Mediator\Services\MediatorLogService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MainController extends Controller
{
    /**
     * @param array $inputs
     * @return void
     * @throws ValidationException
     */
    public function terdugaTB(array $inputs): void
    {
        $validation = Validator::make($inputs, [
            'location_id' => ['required', 'string'],
            'practitioner_NIK' => ['required', 'string'],
            'organization_id' => ['required', 'string'],
            'patient' => ['required', 'array'],
            'patient.nik' => ['required', 'string'],
            'patient.name' => ['required', 'string'],
            'patient.birth_date' => ['required', 'string'],
            'patient.address' => ['required', 'array'],
            'patient.address.*.use' => ['required', 'string'],
            'patient.address.*.country' => ['required', 'string'],
            'patient.address.*.province' => ['required', 'string'],
            'patient.address.*.city' => ['required', 'string'],
            'patient.address.*.district' => ['required', 'string'],
            'patient.address.*.village' => ['required', 'string'],
            'patient.address.*.rt' => ['nullable', 'string'],
            'patient.address.*.rw' => ['nullable', 'string'],
            'patient.address.*.postal_code' => ['nullable', 'string'],
            'patient.address.*.line' => ['required', 'array'],
            'tb_suspect' => ['required', 'array'],
            'tb_suspect.fasyankes_id' => ['required', 'string'],
            'tb_suspect.jenis_fasyankes_id' => ['required', 'string'],
            'tb_suspect.terduga_tb_id' => ['required', 'string'],
            'tb_suspect.terduga_ro_id' => ['nullable', 'string'],
            'tb_suspect.tipe_pasien_id' => ['required', 'string'],
            'status_dm_id' => ['required'],
            'imunisasi_bcg_id' => ['required'],
            'status_hiv_id' => ['required'],
        ])->validate();

        DB::beginTransaction();
        $service = new MediatorLogService();
        $mediatorLog = $service->addNewData(
            $validation,
            MediatorLog::TERDUGA_TB
        );

        $tbTerduga = new TerdugaTB();
        $tbTerduga->save();
        $tbTerduga->mediatorLogs()->attach($mediatorLog->id);
        DB::commit();
    }

    /**
     * @param array $inputs
     * @return void
     * @throws ValidationException
     */
    public function permohonanLab(array $inputs): void
    {
        $validation = Validator::make($inputs, [
            'location_id' => ['required', 'string'],
            'practitioner_NIK' => ['required', 'string'],
            'organization_id' => ['required', 'string'],
            'patient' => ['required', 'array'],
            'patient.nik' => ['required', 'string'],
            'patient.name' => ['required', 'string'],
            'patient.birth_date' => ['required', 'string'],
            'tb_suspect' => ['required', 'array'],
            'tb_suspect.id' => ['required', 'string'],
            'tb_suspect.fasyankes_id' => ['required', 'string'],
            'tb_suspect.jenis_fasyankes_id' => ['required', 'string'],
            'tb_suspect.terduga_tb_id' => ['required', 'string'],
            'tb_suspect.terduga_ro_id' => ['nullable', 'string'],
            'tb_suspect.tipe_pasien_id' => ['required', 'string'],
            'lokasi_anatomi' => ['required', 'string'],
            'no_sediaan' => ['required', 'string'],
            'pengirim' => ['required', 'string'],
            'faskes_tujuan' => ['required', 'string'],
            'jenis_pemeriksaan' => ['required', 'string'],
            'contoh_uji' => ['required', 'string'],
            'alasan_pemeriksaan' => ['required', 'string'],
            'tanggal_permohonan' => ['required', 'date'],
            'tanggal_pengambilan' => ['required', 'date'],
            'tanggal_pengiriman' => ['required', 'date'],
        ])->validate();

        $service = new MediatorLogService();
        $service->addNewData(
            $validation,
            MediatorLog::PERMOHONAN_LAB
        );
    }

    /**
     * @param array $inputs
     * @return void
     * @throws ValidationException
     */
    public function hasilLab(array $inputs): void
    {
        $validation = Validator::make($inputs, [
            'location_id' => ['required', 'string'],
            'practitioner_NIK' => ['required', 'string'],
            'organization_id' => ['required', 'string'],
            'patient' => ['required', 'array'],
            'patient.nik' => ['required', 'string'],
            'patient.name' => ['required', 'string'],
            'patient.birth_date' => ['required', 'string'],
            'tb_suspect' => ['required', 'array'],
            'tb_suspect.id' => ['required', 'string'],
            'tb_suspect.fasyankes_id' => ['required', 'string'],
            'tb_suspect.jenis_fasyankes_id' => ['required', 'string'],
            'tb_suspect.terduga_tb_id' => ['required', 'string'],
            'tb_suspect.terduga_ro_id' => ['nullable', 'string'],
            'tb_suspect.tipe_pasien_id' => ['required', 'string'],
            'no_sediaan' => ['required', 'string'],
            'lokasi_anatomi' => ['required', 'string'],
            'pengirim' => ['required', 'string'],
            'penerima' => ['required', 'string'],
            'pemeriksa' => ['required', 'string'],
            'contoh_uji' => ['required', 'string'],
            'kondisi_contoh_uji_id' => ['required', 'string'],
            'jenis_pemeriksaan' => ['required', 'string'],
            'catatan_pemeriksaan' => ['required', 'string'],
            'hasil_pemeriksaan' => ['required', 'string'],
            'tanggal_daftar' => ['required', 'date'],
            'tanggal_contoh_uji' => ['required', 'date'],
            'tanggal_hasil_lab' => ['required', 'date'],
        ])->validate();

        $service = new MediatorLogService();
        $service->addNewData(
            $validation,
            MediatorLog::HASIL_LAB
        );
    }
}
