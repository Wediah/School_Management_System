<?php

namespace App\Listeners;

use App\Events\AssignmentAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class SendAssignmentNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AssignmentAdded $event): void
    {
        Http::post('https://schoolmanagement_app.test/api/addAssignment', [
            'assignment' => $event->assignment,
        ]);
    }
}
