<?php

namespace App\Mediator\Concerns;

use App\Mediator\Models\MediatorLog;

final class MediatorLogHelper
{
    public static $mediatorLog;

    public static function getMediatorLog(): MediatorLog
    {
        return self::$mediatorLog;
    }

    public static function setMediatorLog(MediatorLog  $mediatorLog): self
    {
        self::$mediatorLog = $mediatorLog;
        return new MediatorLogHelper();
    }
}
