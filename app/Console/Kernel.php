<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Inserzione;
use App\Notifications\VenditaCompletata;
use App\Notifications\AcquistoCompletato;
use App\Notifications\AcquistoFallito;
use App\Notifications\VenditaFallita    ;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*Viene richiamato ogni minuto il metodo per controllare se un post è scaduto, ed eventualmente viene inviata una mail al proprietario dell'inserzione
        * ed al provabile acquirente
        */
        $schedule -> call(function() {
            foreach(Inserzione::where('stato', 0) -> get() as $inserzione) {
                //Controlla se si è raggiunto il tempo attuale per il termine dell'inserzione
                if(Carbon::now() -> isAfter(Carbon::createFromTimeString($inserzione -> fine_inserzione))) {
                    //Se l'inserzione è terminata viene aggiornato lo stato, poi si procede a controllare se è stata venduta a qualcuno
                    $inserzione -> stato = 1;
                    if(($inserzione -> offerte -> count()) > 0) {
                        $venditore = $inserzione -> utente;
                        $acquirente = $inserzione -> offerte -> sortByDesc('prezzo') -> first() -> utente;

                        $venditore -> notify(new VenditaCompletata($inserzione));
                        $acquirente -> notify(new AcquistoCompletato($inserzione));
                        foreach( $inserzione -> offerte -> where('id_utente', '!=', $acquirente -> id) as $offertaFallita) {
                            $offertaFallita -> utente -> notify(new AcquistoFallito($offertaFallita));
                        }
                    } else {
                        $inserzione -> utente -> notify(new VenditaFallita($inserzione));
                    }
                    $inserzione -> save();
                }
            }
        }) -> everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
