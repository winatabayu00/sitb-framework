<?php

namespace App\Mediator\Services;

use App\Mediator\Jobs\PerformMediatorLog;
use App\Mediator\Models\MediatorLog;

class MediatorLogService
{
    public function addNewData(array $inputs, string $process): MediatorLog
    {
        $mediatorLog = new MediatorLog();
        $mediatorLog->process = $process;
        $mediatorLog->payload = $inputs;
        $schedule = !empty($this->inputs['schedule_at']) ? $this->inputs['schedule_at'] : time();
        $mediatorLog->schedule_at = \Carbon\Carbon::parse((int)$schedule);
        $mediatorLog->save();

        dispatch(new PerformMediatorLog($mediatorLog));

        return $mediatorLog;
    }
}
