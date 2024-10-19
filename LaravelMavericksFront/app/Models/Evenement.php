<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'event_date',
        'nbParticipant',
       
    ];
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
