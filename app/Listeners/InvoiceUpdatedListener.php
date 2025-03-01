<?php

namespace App\Listeners;

use App\Events\InvoiceUpdatedEvent;
use App\Notifications\InvoiceUpdated;
use Illuminate\Support\Facades\Notification;

class InvoiceUpdatedListener
{

    /**
     * Handle the event.
     *
     * @param InvoiceUpdatedEvent $event
     * @return void
     */

    public function handle(InvoiceUpdatedEvent $event)
    {
        if (!isRunningInConsoleOrSeeding()) {
            Notification::send($event->notifyUser, new InvoiceUpdated($event->invoice));
        }
    }

}
