<?php

namespace App\Mediator\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

/**
 * @property string $id
 * @property string $type
 * @property string $process
 * @property array $payload
 * @property array $headers
 * @property array $response
 * @property array $payload_send
 * @property integer $retry
 * @property string $status
 * @property DateTimeInterface|Carbon $schedule_at
 * @property DateTimeInterface|Carbon $execute_at
 * @property DateTimeInterface|Carbon $failed_at
 * @property DateTimeInterface|Carbon $success_at
 * @property DateTimeInterface|Carbon $resend_at
 * */
class MediatorLog extends Model
{
    use HasFactory;

    protected $table = 'mediator_logs';

    public const PENDING = 'pending';
    public const PROCESS = 'process';
    public const FAILED = 'failed';
    public const SUCCESS = 'success';
    public const RESEND = 'resend';

    public const TERDUGA_TB = 'terduga_tb';
    public const PERMOHONAN_LAB = 'permohonan_lab';
    public const HASIL_LAB = 'hasil_lab';
    public const HASIL_DIAGNOSA = 'hasil_diagnosa';

    /**
     * @return string
     */
    public function getProcess(): string
    {
        switch ($this->process) {
            case self::TERDUGA_TB:
                $process =  'terdugaTb';
                break;
            case self::PERMOHONAN_LAB:
                $process =  'permohonanLab';
                break;
            case self::HASIL_LAB:
                $process =  'hasilLab';
                break;
            case self::HASIL_DIAGNOSA:
                $process =  'hasilDiagnosis';
                break;
            default:
                throw new InvalidArgumentException('Invalid process name: ' . $this->process);
        }
        return $process;
    }


    protected $fillable = [
        'type',
        'process',
        'payload',
        'headers',
        'response',
        'retry',
        'status',
        'payload_send',
        'schedule_at',
        'execute_at',
        'failed_at',
        'success_at',
        'resend_at',
    ];

    protected $casts = [
        'payload' => 'array',
        'response' => 'array',
        'headers' => 'array',
        'payload_send' => 'array',
        'retry' => 'integer',
        'status' => 'string',
        'schedule_at' => 'datetime',
        'execute_at' => 'datetime',
        'failed_at' => 'datetime',
        'success_at' => 'datetime',
        'resend_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
