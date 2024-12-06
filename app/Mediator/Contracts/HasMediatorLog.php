<?php

namespace App\Mediator\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface HasMediatorLog
{
    public function mediatorLogs(): BelongsToMany;
}
