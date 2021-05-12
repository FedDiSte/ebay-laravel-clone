<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VenditaCompletata extends Notification
{
    use Queueable;

    protected $inserzione;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($inserzione)
    {
        $this -> inserzione = $inserzione;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage) -> view ('email.vendita-completata', [
            'inserzione' => $this -> inserzione,
        ]);
    }
}
