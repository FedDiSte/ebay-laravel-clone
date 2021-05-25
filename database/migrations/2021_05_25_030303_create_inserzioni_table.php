<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInserzioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inserzioni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_creatore')
                            ->constrained('utenti')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->string('nome');
            $table->string('descrizione');
            $table->tinyInteger('stato');
            $table->decimal('prezzo', 15, 2);
            $table->timestamp('fine_inserzione');
            $table->foreignId('genere_id')
                            ->constrained('generi')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->decimal('prezzo_latest', 15, 2)
                            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inserzioni');
    }
}
