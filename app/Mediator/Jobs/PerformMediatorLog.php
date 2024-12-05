<?php

namespace App\Mediator\Jobs;

use App\Mediator\Concerns\MediatorLogHelper;
use App\Mediator\Http\Controllers\MediatorController;
use App\Mediator\Models\MediatorLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class PerformMediatorLog implements ShouldQueue
{
    use Queueable;

    public $mediatorLog;

    /**
     * Create a new job instance.
     */
    public function __construct(
        MediatorLog $mediatorLog
    )
    {
        $this->mediatorLog = $mediatorLog;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->mediatorLog->status = MediatorLog::PROCESS;
        $this->mediatorLog->execute_at = now();
        $this->mediatorLog->save();

        $controller = new MediatorController();

        MediatorLogHelper::setMediatorLog($this->mediatorLog);

        $controller->{$this->mediatorLog->getProcess()}($this->mediatorLog->payload);
    }
}
