<?php
// app/Models/Transport.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'nom'];

    public function hebergements()
    {
        return $this->hasMany(Hebergement::class);
    }
}

