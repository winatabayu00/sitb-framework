<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mediator_logs', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('direct, schedule');
            $table->string('process');
            $table->jsonb('payload');
            $table->jsonb('payload_send')->nullable();
            $table->jsonb('response')->nullable();
            $table->integer('retry')->default(0);
            $table->string('status')->default(\App\Mediator\Models\MediatorLog::PENDING);
            $table->timestamp('schedule_at', )->nullable();
            $table->timestamp('execute_at', )->nullable();
            $table->timestamp('failed_at', )->nullable();
            $table->timestamp('success_at', )->nullable();
            $table->timestamp('resend_at', )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
