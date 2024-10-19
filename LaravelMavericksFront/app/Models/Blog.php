<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evenement;

class Blog extends Model
{
    protected $fillable = ['title', 'content', 'author', 'slug', 'cover_image'];

    public function user()
    {
        return $this->belongsTo(User::class);  
    }
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}

