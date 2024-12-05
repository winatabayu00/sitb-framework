<?php

namespace App\Mediator\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Context;
use Mediator\SatuSehat\Lib\Client\ApiException;
use Mediator\SatuSehat\Lib\Client\Model\Condition;
use Mediator\SatuSehat\Lib\Client\Model\Encounter;
use Mediator\SatuSehat\Lib\Client\Model\ModelInterface;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\Model\SubmitResponse;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\ValidationException;
use function App\Services\parseDateTime;
use function App\Services\parseDateTimeWithTimezone;

class MediatorService extends BaseService
{

    public function __construct(string $formClass, string $organizationId, string $locationId, string $practionerNik, string $kunjungan, TbSuspect $tbSuspect, Patient $patient)
    {
        parent::__construct($formClass, $organizationId, $locationId, $practionerNik, $kunjungan, $tbSuspect, $patient);
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function initData(): void
    {
        // kirim dari luar
        $this->form->setProfile(['TB']);// TODO: cannot be hardcoded
        $this->form->setOrganizationId($this->organizationId); // TODO: cannot be hardcoded s
        $this->form->setLocationId($this->locationId); // TODO: cannot be hardcoded s
        $this->form->setPractitionerNik($this->practionerNik); // TODO: cannot be hardcoded s

        $this->form->setPatient($this->patient);

        $this->form->setTbSuspect($this->tbSuspect);
        // TODO: encounter still hardcoded
        $encounter = new Encounter();
        $encounter
            ->setLocalId($this->kunjungan)
            ->setClassification('AMB')
            ->setPeriodStart(parseDateTimeWithTimezone(date('Y-m-d')))
            ->setPerionInProgress(parseDateTimeWithTimezone(date('Y-m-d')))
            ->setPeriodEnd(parseDateTimeWithTimezone(date('Y-m-d')));
        $this->form->setEncounter($encounter);
        $this->form->addCondition(
            (new Condition())
                ->setCodeCondition("Z10")
        );
    }

    /**
     * @param array $input
     * @return array|false|ModelInterface|SubmitResponse|string
     * @throws GuzzleException
     * @throws ApiException
     */

    public function sendTerdugaTb(array $input): mixed
    {
        $this->initData();
        $this->form->build();

        try {
            $response = $this->form->send();
        } catch (RequestException $e) {
            $response = json_encode(json_decode($e->getResponse()->getBody()->getContents()), JSON_PRETTY_PRINT);
        }

        return $response;
    }

    public function sendPermohonanLab(array $input): mixed
    {
        $this->initData();
        $this->form->setTanggalPermohonan($input['tanggal_permohonan'])
            ->setDokterPengirim($input['pengirim'])
            ->setFaskesTunjuan($input['faskes_tujuan'])
            ->setJenisPemeriksaan($input['jenis_pemeriksaan'])
            ->setJenisContohUji($input['contoh_uji'])
            ->setTanggalWaktuPengambilanContohUji($input['tanggal_pengambilan'])
            ->setTanggalWaktuPengirimanContohUji($input['tanggal_pengiriman']);
        $this->form->setAlasanPemeriksaan($input['alasan_pemeriksaan'] ?? 'pemeriksaan_diagnosis');
        if (!empty($input['lokasi_anatomi']))
            $this->form->setDugaanLokasiAnatomi($input['lokasi_anatomi']);

        $this->form->build();

        try {
            $response = $this->form->send();
        } catch (RequestException $e) {
            $response = json_encode(json_decode($e->getResponse()->getBody()->getContents()), JSON_PRETTY_PRINT);
        }

        return $response;
    }

    /**
     * @param array $input
     * @param array|null $hasilUji
     * @param string|null $serviceRequestId
     * @param string|null $noRegLab
     * @return array|false|ModelInterface|SubmitResponse|string
     * @throws ApiException
     * @throws GuzzleException
     */
    public function sendHasilLab(
        array  $input,
        ?array $hasilUji = null,
        string $serviceRequestId = null,
        string $noRegLab = null
    )
    {
        $this->initData();

        $specimentId = 'e0768d3a-57e3-42c0-9c06-61ccd584cc6a';

        $tanggalHasil = parseDateTime($input['tanggal_hasil_lab']);

        $catatan = $input['catatan_pemeriksaan'];
        $nilai = $input['hasil_pemeriksaan'];

        $hasil = $this->form;
        /** dokter pengirim, penerima, pemeriksa */
        $hasil
            ->setDokterPengirim($input['pengirim'])
            ->setPenerimaContohUji($input['penerima'])
            ->setDokterPemeriksaLab($input['pemeriksa']);

        /** dokter pengirim, penerima, pemeriksa */
        $hasil
            ->setJenisPemeriksaan($input['jenis_pemeriksaan']);
        /** tanggal */
        $hasil
            ->setTanggalWaktuPenerimaanContohUji(parseDateTime($input['tanggal_contoh_uji']))
            ->setTanggalWaktuRegisterLab(parseDateTime($input['tanggal_daftar']));

        /** hardcoded */

        $hasil = $this->form
            // ->setPermohonanLabId($permohonanId)
            ->setFaskesTunjuan('100011961')
            ->setJenisContohUji($input['contoh_uji'])
            ->setSpesimenId($specimentId, 'specimen_1')
//            ->setPermohonanLabId($serviceRequestId)
            ->setServiceRequestId($serviceRequestId)
            ->setKonfirmasiContohUji($input['kondisi_contoh_uji_id'], null)
            ->getHasil();

        $hasil->setContohUji($input['contoh_uji'])
            ->setTanggalHasil($tanggalHasil)
            ->setNomorRegistrasiLab($noRegLab)
            ->setCatatan($catatan)
            ->setNilai($nilai);

        if (!empty($hasilUji)) {
            if ($input['jenis_pemeriksaan'] == 'tcm_xdr') {
                $hasil->setMtb($hasilUji['mtb'])
                    ->setHDosisRendah($hasilUji['h'])
                    ->setH($hasilUji['ht'])
                    ->setFq($hasilUji['fq'])
                    ->setFqt($hasilUji['fqt'])
                    ->setAmk($hasilUji['amk'])
                    ->setKm($hasilUji['km'])
                    ->setCm($hasilUji['cm'])
                    ->setEto($hasilUji['eto']);
            } elseif ($input['jenis_pemeriksaan'] == 'lini_1') {
                $hasil->setMtb($hasilUji['mtb'])
                    ->setHDosisRendah($hasilUji['h'])
                    ->setH($hasilUji['ht'])
                    ->setRifampisin($hasilUji['rif'])
                    ->setEto($hasilUji['eto'])
                    ->setPto($hasilUji['pto']);
            } elseif ($input['jenis_pemeriksaan'] == 'lini_2') {

            } elseif ($input['jenis_pemeriksaan'] == 'biakan') {

            } elseif ($input['jenis_pemeriksaan'] == 'kepekaan') {

            } elseif ($input['jenis_pemeriksaan'] == 'bdmax') {

            } elseif ($input['jenis_pemeriksaan'] == 'pcr') {

            }
        }

        $this->form->build();

        try {
            $response = $this->form->send();
        } catch (RequestException $e) {
            // echo ' ABCDEF ' . json_encode($e->getResponseBody());
            $response = json_encode(json_decode($e->getResponse()->getBody()->getContents()), JSON_PRETTY_PRINT);
        }
        return $response;
    }

    /**
     * @param array $input
     * @return array|false|ModelInterface|SubmitResponse|string
     * @throws ApiException
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function sendHasilDiagnosa(array $input)
    {
        $this->initData();

        $this->form
            ->setStatusPengobatan('not-started')
            // ->setPermohonanLabId($permohonanId)
            ->setTanggalHasilDiagnosis($input['tanggal_hasil'])
            ->setXrayHasil($input['hasil_pemeriksaan'])
            ->setXrayTanggalWaktu($input['thorax_tanggal'])
            ->setXrayKesan($input['thorax_kesan'])
            ->setLokasiAnatomi($input['lokasi_anatomi'])
            ->setHasilDiagnosis('active', '2')
            ->setTipeDiagnosis($input['tipe_diagnosis'])
            ->setTindakLanjutPengobatan($input['tindak_lanjut'])
            ->setTempatPengobatan($input['tempat_pengobatan'])
            ->build();

        try {
            $response = $this->form->send();
        } catch (RequestException $e) {
            // echo ' ABCDEF ' . json_encode($e->getResponseBody());
            $response = json_encode(json_decode($e->getResponse()->getBody()->getContents()), JSON_PRETTY_PRINT);
        }
        return $response;
    }

}
