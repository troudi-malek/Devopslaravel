<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voyageur_id')->constrained('voyageurs')->onDelete('cascade');
            $table->date('date_reservation');
            $table->enum('statut', ['confirmée', 'annulée', 'en attente'])->default('en attente');
            $table->timestamps(); // Pour created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
