<?php

// database/migrations/xxxx_xx_xx_create_transports_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Ex: bus, train, avion, etc.
            $table->string('nom');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transports');
    }
}

