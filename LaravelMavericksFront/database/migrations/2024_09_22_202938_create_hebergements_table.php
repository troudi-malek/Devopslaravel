<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHebergementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hebergements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('adresse');
            $table->unsignedBigInteger('transport_id'); // Clé étrangère
            $table->binary('image'); // New column for storing image as binary data
            $table->timestamps();

            // Relation avec la table transports
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hebergements');
    }
}
