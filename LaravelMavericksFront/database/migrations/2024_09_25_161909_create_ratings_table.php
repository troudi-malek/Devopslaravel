<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();

            // Associate rating with an activity
            $table->foreignId('activity_id')->constrained()->cascadeOnDelete();
            // Rating fields
            $table->tinyInteger('rating')->unsigned(); // Note entière de 1 à 5
            $table->integer('date');
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
