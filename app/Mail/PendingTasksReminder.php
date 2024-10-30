<?php
// app/Mail/PendingTasksReminder.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PendingTasksReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $tasks;

    /**
     * Create a new message instance.
     *
     * @param $tasks
     * @return void
     */
    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Daily Reminder: Pending Tasks')
                    ->view('emails.pending-tasks');
    }
}
