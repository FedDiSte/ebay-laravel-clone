<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerte', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utente')
                            ->constrained('utente')
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
            $table->foreignId('id_inserzione')
                            ->constrained('inserzione')
                            ->onUpdate('cascade')
                            ->onDelete('cascade');
            $table->decimal('prezzo', 15, 2);
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
        Schema::dropIfExists('offerte');
    }
}
