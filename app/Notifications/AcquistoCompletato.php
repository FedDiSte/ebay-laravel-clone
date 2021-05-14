<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AcquistoCompletato extends Notification
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
        $this -> inserzione = $inserzione ;
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
        $utente = $this -> inserzione -> offerte -> sortByDesc('prezzo') -> first() -> utente;
        $inserzione -> $this -> inserzione;
        $url = url('/inserzione/' . $inserzione -> id);
        $prezzo = $this -> inserzione -> offerte -> max('prezzo');
        $venditore = $this -> inserzione -> utente;

        return (new MailMessage)
                    -> greeting('Ciao' . $utente -> nome . ' ' -> $utente -> cognome)
                    -> line('Hai comprato con successo ' . $inserzione -> nome)
                    -> line('La tua offerta è di ' . $prezzo . '€')
                    -> action('Vedi inserzione', $url)
                    -> line('Contatta il venditore ' . $venditore -> nome . ' ' . $venditore -> cognome
                    -> line($venditore -> email);
    }

}
