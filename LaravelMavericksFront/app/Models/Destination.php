<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'localisation'];

    // Une destination a plusieurs itinéraires
    public function itineraires()
    {
        return $this->hasMany(Itineraire::class);
    }}
