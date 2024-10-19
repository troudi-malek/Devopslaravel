<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipementsTable extends Migration
{
    public function up()
    {
        Schema::create('equipements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix', 8, 2);
            $table->integer('quantite_disponible');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipements');
    }
}
