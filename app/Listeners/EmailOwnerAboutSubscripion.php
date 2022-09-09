<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\UserSubscribedMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOwnerAboutSubscripion
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        DB::table('newsletter')->insert([
            'email' => $event->email
        ]);

        Mail::to($event->email)->send(new UserSubscribedMessage);
    }
}
