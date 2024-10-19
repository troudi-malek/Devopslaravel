<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'adresse', 'transport_id', 'image']; // Allow 'image' to be fillable

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
