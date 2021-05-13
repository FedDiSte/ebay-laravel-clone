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
        $utente = $this -> inserzione -> utente;
        $inserzione = $this -> inserzione;
        $url = url('/inserzione/' . $inserzione -> id);
        $prezzo = $this -> inserzione -> offerte -> max('prezzo');
        $acquirente = $this -> inserzione -> offerte -> sortByDesc('prezzo') -> first() -> utente;

        return (new MailMessage)
                    -> greeting('Ciao ' . $utente -> nome .' '. $utente -> cognome)
                    -> line('Sei riuscit* a vendere ' . $inserzione -> nome)
                    -> line('Il prezzo finale è ' . $prezzo . '€')
                    -> action('Vedi la tua inserzione', $url)
                    -> line('Per concludere mettiti in contatto con ' . $acquirente -> nome .' '. $acquirente -> cognome)
                    -> line($acquirente -> email);
    }
}
