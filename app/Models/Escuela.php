<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}
