<?php

namespace App\Mediator\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mediator\Concerns\MediatorLogHelper;
use App\Mediator\Models\MediatorLog;
use App\Mediator\Services\MediatorService;
use GuzzleHttp\Exception\GuzzleException;
use Mediator\SatuSehat\Lib\Client\ApiException;
use Mediator\SatuSehat\Lib\Client\Configuration;
use Mediator\SatuSehat\Lib\Client\Model\ModelInterface;
use Mediator\SatuSehat\Lib\Client\Model\Patient;
use Mediator\SatuSehat\Lib\Client\Model\SubmitResponse;
use Mediator\SatuSehat\Lib\Client\Model\TbSuspect;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\Diagnosis;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\HasilLab;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\PermohonanLab;
use Mediator\SatuSehat\Lib\Client\Profiles\TB\Forms\Terduga;
use Mediator\SatuSehat\Lib\Client\Profiles\ValidationException;

class MediatorController extends Controller
{
    /**
     * @return void
     */
    private function beforeExecution(): void
    {
        Configuration::setConfigurationConstant(
            'main-configuration',
            new \Mediator\SatuSehat\Lib\Client\ConfigurationConstant(
                'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/accesstoken',
                'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1/refreshtoken',
                'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
                'https://mediator-satusehat.kemkes.go.id/api-dev/satusehat/rme/v1.0',
                null,// $clientId,
                null,// $clientId,
                !empty($headers['x-token']) ? $headers['x-token'][0] : null,// $clientId,
                '+07:00'
            )
        );
    }

    public function __construct()
    {
        $this->beforeExecution();
    }

    /**
     * @param array $input
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function terdugaTb(array $input): void
    {
        $patient = new Patient($input['patient']);

        $tbSuspect = new TBSuspect($input['tb_suspect']);
        $kunjungan = '2024-05-24 10:27:26.405593+07';

        $service = new MediatorService(
            Terduga::class,
            $input['organization_id'],
            $input['location_id'],
            $input['practitioner_NIK'],
            $kunjungan,
            $tbSuspect,
            $patient
        );
        $response = $service->sendTerdugaTb($input);

        $this->handleResponse($response);
    }

    /**
     * @param array $input
     * @return mixed
     * @throws \Exception
     */
    public function permohonanLab(array $input): void
    {
        $patient = new Patient($input['patient']);

        $tbSuspect = new TBSuspect($input['tb_suspect']);
        $kunjungan = '2024-05-24 09:27:26.405593+07';
        $service = new MediatorService(
            PermohonanLab::class,
            $input['organization_id'],
            $input['location_id'],
            $input['practitioner_NIK'],
            $kunjungan,
            $tbSuspect,
            $patient
        );

        $response = $service->sendPermohonanLab($input);

        $this->handleResponse($response);
    }

    /**
     * @param array $input
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     */
    public function hasilLab(array $input): void
    {
        $patient = new Patient($input['patient']);

        $tbSuspect = new TBSuspect($input['tb_suspect']);
        $kunjungan = '2024-05-24 09:27:26.405593+07';
        $service = new MediatorService(
            HasilLab::class,
            $input['organization_id'],
            $input['location_id'],
            $input['practitioner_NIK'],
            $kunjungan,
            $tbSuspect,
            $patient
        );

        $response = $service->sendHasilLab($input);
        $this->handleResponse($response);
    }

    /**
     * @param array $input
     * @return mixed
     * @throws ApiException
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function hasilDiagnosis(array $input): void
    {
        $patient = new Patient($input['patient']);
        $tbSuspect = new TBSuspect($input['tb_suspect']);
        $kunjungan = '2024-05-24 09:27:26.405593+07';

        $service = new MediatorService(
            Diagnosis::class,
            $input['organization_id'],
            $input['location_id'],
            $input['practitioner_NIK'],
            $kunjungan,
            $tbSuspect,
            $patient
        );

        $response = $service->sendHasilDiagnosa($input);
        $this->handleResponse($response);
    }

    /**
     * @param false|array|ModelInterface|SubmitResponse|string $response
     * @return void
     * @throws \Exception
     */
    public function handleResponse($response): void
    {
        $mediatorLog = MediatorLogHelper::getMediatorLog();
        if (!$mediatorLog instanceof MediatorLog) {
            throw new \Exception('Mediator Log Not Found');
        }
        if ($response instanceof SubmitResponse) {
            /** @var SubmitResponse $response */
            $data = [];
            foreach (SubmitResponse::getters() as $key => $getFunction) {
                $data[$key] = $response->{$getFunction}();
            }

            $mediatorLog->status = MediatorLog::SUCCESS;
            $mediatorLog->response = $data;
            $mediatorLog->success_at = now();
            //            $this->storeSatuSehat($response, [
//                'kunjungan' => $kunjungan,
//                'pasien' => $patient->getNik(),
//                'faskes' => $fasyankes_id,
//            ]);
        } else {
            $mediatorLog->status = MediatorLog::FAILED;
            $mediatorLog->response = json_decode($response, true);
            $mediatorLog->failed_at = now();
        }
        $mediatorLog->save();
    }
}
