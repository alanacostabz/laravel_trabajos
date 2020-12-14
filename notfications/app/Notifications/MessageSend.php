<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MessageSend extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['database'];

        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)->view(
            'emails.notification',
            [
                'msg' => $this->message,
                'user' => $notifiable
            ]
        )->subject('Mensaje recibido desde Aseenti');

        #mailable
        //return (new CustomMail($message))->to($notifiable->email);

        // return (new MailMessage)
        //     ->greeting($notifiable->name) . ', '
        //     ->subject('Mensaje recibido desde tu sitio web.')
        //     ->line('Has recibido un mensaje.')
        //     ->action('Click aquí para ver el mensaje', route('messages.show', $this->message->id))
        //     ->line('Gracias por usar nuestra aplicación.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //return $this->message->toArray();

        return [
            'link' => route('messages.show', $this->message->id),
            'text' => "Has recibido una mensaje de " . $this->message->sender->name
        ];
    }
}
