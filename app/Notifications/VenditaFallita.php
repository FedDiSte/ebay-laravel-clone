<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VenditaFallita extends Notification
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
        $utente = $this -> inserzione -> utente;
        $inserzione = $this -> inserzione;
        $url = url('/inserzione/'.$inserzione -> id);

        return (new MailMessage)
                    ->greeting('Ciao ' . $utente -> nome . ' ' . $utente -> cognome)
                    ->line('Purtroppo non sei riuscit* a vendere ' . $inserzione -> nome . '...')
                    ->line('Puoi sempre pubblicare nuovamente pubblicare una nuova inserzione!')
                    ->action('Vedi la vecchia inserzione', $url);
    }
}
