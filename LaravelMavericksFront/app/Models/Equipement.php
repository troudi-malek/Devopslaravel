<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Equipement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',  // Nom de l'équipement (ex : vélo, tente)
        'description',  // Description de l'équipement
        'prix',  // Prix de la réservation de l'équipement
        'quantite_disponible',  // Quantité d'équipement disponible pour la réservation
    ];

    /**
     * Une méthode pour lier un équipement avec une ou plusieurs réservations.
     * @return BelongsToMany
     */
    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class);
    }
}
