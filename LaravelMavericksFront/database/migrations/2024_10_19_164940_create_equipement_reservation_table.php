<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipementReservationTable extends Migration
{
    public function up()
    {
        Schema::create('equipement_reservation', function (Blueprint $table) {
            $table->id();

            // Clé étrangère vers la table equipements
            $table->unsignedBigInteger('equipement_id');
            $table->unsignedBigInteger('reservation_id');

            $table->timestamps();

            // Définition des clés étrangères
            $table->foreign('equipement_id')
                  ->references('id')
                  ->on('equipements')
                  ->onDelete('cascade');

            $table->foreign('reservation_id')
                  ->references('id')
                  ->on('reservations')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipement_reservation');
    }
}
