<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConseilVoyage extends Model
{
    use HasFactory;
    protected $fillable = [
        'contenu',
        'destination_id',
    ];
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
