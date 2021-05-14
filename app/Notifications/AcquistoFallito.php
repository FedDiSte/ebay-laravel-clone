<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcquistoFallito extends Notification
{
    use Queueable;

    protected $offerta;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($offerta)
    {
        $this -> offerta = $offerta;
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
    public function toMail($notifiable) {

        $utente = $this -> offerta -> utente;
        $inserzione = $this -> offerta -> inserzione;
        $url = url('/inserzione/'.$inserzione -> id);

        return (new MailMessage)
                        ->greeting('Ciao ' . $utente -> nome . ' ' . $utente -> cognome)
                        ->line('Purtroppo non sei riuscit* ad aggiudicarti ' . $inserzione -> nome . '...')
                        ->line('La tua offerta di ' . $this -> offerta -> prezzo . ' € è stata superata')
                        ->action('Vedi inserzione', $url);
    }

}
