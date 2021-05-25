<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utenti', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('nome');
            $table->string('cognome');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();
            $table->foreignId('genere_preferito')
                                ->constrained('generi')
                                ->onUpdate('cascade')
                                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utenti');
    }
}
