<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use App\Mail\TuMensajeFueRecibido;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

// si utilizaramos jobs para dar la respuesta mas rapido mientras se procesa la tarea
//class SendAutoresponder implements ShouldQueue
class SendAutoresponder implements ShouldQueue
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
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;

        if (auth()->check()) {
            $message->nombre = auth()->user()->name;
            $message->email = auth()->user()->email;
        }

        #mailable
        Mail::to($message->email)->send(new TuMensajeFueRecibido($message));

        // Mail::send('emails.contact', ['msg' => $message], function ($m) use ($message) {
        //     $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        // });
    }
}
