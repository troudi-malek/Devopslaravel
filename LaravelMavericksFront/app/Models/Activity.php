<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
      //  'itiniraire_id', 
        'name', 
        'duration', 
        'description', 
        'image'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
