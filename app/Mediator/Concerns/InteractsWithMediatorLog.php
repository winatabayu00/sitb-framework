<?php

namespace App\Mediator\Concerns;

use App\Mediator\Models\MediatorLog;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait InteractsWithMediatorLog
{
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
