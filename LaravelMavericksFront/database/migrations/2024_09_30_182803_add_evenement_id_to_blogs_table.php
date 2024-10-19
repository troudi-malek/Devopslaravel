<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Add the evenement_id column
            $table->unsignedBigInteger('evenement_id')->nullable()->after('id'); // Adjust the position if necessary

            // Create the foreign key constraint
            $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Drop the foreign key and the column on rollback
            $table->dropForeign(['evenement_id']);
            $table->dropColumn('evenement_id');
        });
    }
};
