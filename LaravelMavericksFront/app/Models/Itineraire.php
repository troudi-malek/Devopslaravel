<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itineraire extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id', 'titre', 'duree', 'description'];

    // Un itinéraire appartient à une destination
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }}
