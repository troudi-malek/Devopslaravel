<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
           //  $table->foreignId('itiniraire_id')->constrained()->cascadeOnDelete();
             $table->string('name');
             $table->integer('duration');
             $table->text('description');
             $table->string('image');

             $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
