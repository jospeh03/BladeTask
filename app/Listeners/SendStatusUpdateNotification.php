<?php

namespace App\Listeners;

use App\Events\TaskStatusToggled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendStatusUpdateNotification
{
    public function __construct()
    {
        //
    }

    public function handle(TaskStatusToggled $event)
    {
        // You can add logging, email, or any action you want here.
        // For example:
        \Log::info("Task status changed", [
            'task_id' => $event->task->id,
            'status' => $event->task->status,
        ]);

        // You could also send an email notification or update other services
    }
}
