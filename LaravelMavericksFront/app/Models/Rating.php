<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [

        //'voyageur_id', 
       'activity_id', 
        'rating', 
        'date', 
        'comment'
    ];

    // Define the relationship with the voyageur (traveler)
   /* public function voyageur()
    {
        return $this->belongsTo(Voyageur::class);
    }*/

    // Define the relationship with the activity
        'comment'
    ];


    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}
