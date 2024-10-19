<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConseilVoyagesTable extends Migration
{
    public function up()
    {
        Schema::create('conseil_voyages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id'); // Assurez-vous que c'est bien unsigned
            $table->text('conseil');
            $table->timestamps();

            // Ajout de la contrainte de clé étrangère
            $table->foreign('destination_id')
                  ->references('id')
                  ->on('destinations')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('conseil_voyages');
    }
}
