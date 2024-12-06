<?php

namespace App\Mediator\Models;

use App\Mediator\Concerns\InteractsWithMediatorLog;
use App\Mediator\Contracts\HasMediatorLog;
use Illuminate\Database\Eloquent\Model;

class TerdugaTB extends Model implements HasMediatorLog
{

    use InteractsWithMediatorLog;

    protected $table = 'tb_terduga';
    protected $fillable = [

    ];
}
