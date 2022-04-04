<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
// use App\Events\ContactEvent;
use Illuminate\Support\Facades\Mail;

class ContactListeners implements ShouldQueue
{
    use Queueable, SerializesModels;
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
    public function handle($event)
    {
        $input = $event->input;

        $email_admin = getOptions('general', 'email_admin');

        Mail::send('frontend.mail.mail-teamplate', $input , function ($msg) use ($email_admin) {

            $msg->from('vunamc1601@gmail.com', 'Website - RENAI Việt Nam');

            $msg->to($email_admin)->subject('Liên hệ từ khách hàng');

        });

    }
}
