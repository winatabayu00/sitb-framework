<?php

use App\Mediator\Models\MediatorLog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelHasMediatorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_has_mediator_logs', function (Blueprint $table) {
           $table->foreignIdFor(MediatorLog::class, 'mediator_log_id')
               ->constrained((new MediatorLog())->getTable())
               ->onDelete('restrict');
           $table->string('model_type');
           $table->string('model_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_has_mediator_logs');
    }
}
