<?php
// app/Console/Commands/SendPendingTasksReminder.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\PendingTasksReminder;
use Illuminate\Support\Facades\Mail;
use App\Models\Task;

class SendPendingTasksReminder extends Command
{
    protected $signature = 'send:pending-tasks-reminder';
    protected $description = 'Send an email reminder to users with pending tasks';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $pendingTasks = Task::where('id', $user->id)
                                ->where('status', 'Pending')
                                ->get();

            if ($pendingTasks->isNotEmpty()) {
                Mail::to($user->email)->send(new PendingTasksReminder($pendingTasks));
            }
        }

        $this->info('Pending tasks reminder sent to users with pending tasks.');
    }
}
