<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // informacion que se va a guardar en la base de datos
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];
}
