<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'destination', 'date_reservation', 'statut'];

    public function voyageur(): BelongsTo
    {
        return $this->belongsTo(Voyageur::class);
    }

    /**
     * La relation entre la réservation et les équipements
     * Un équipement peut être réservé pour une ou plusieurs réservations
     */
    public function equipements(): BelongsToMany
    {
        return $this->belongsToMany(Equipement::class);
    }

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
