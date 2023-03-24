<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        // Inserisci colonne che possono essere migrate tutte insieme
        'title',
        'slug',
        'year',
        'description',
        'img'
    ];
}
