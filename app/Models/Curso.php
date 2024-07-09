<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'materiales',
        'conocimientos_previos',
        'herramientas',
        'videos',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
