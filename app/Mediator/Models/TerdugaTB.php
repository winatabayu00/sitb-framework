<?php

namespace App\Mediator\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TerdugaTB extends Model
{
    protected $table = 'tb_terduga';
    protected $fillable = [

    ];

    public function mediatorLogs(): BelongsToMany
    {
        return $this->morphToMany(
            MediatorLog::class,
            "model",
            'model_has_mediator_logs',
            'model_id',
            'mediator_log_id',
        );
    }
}
