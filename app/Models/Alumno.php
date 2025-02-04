<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'apellidos', 'fecha_nacimiento', 'ciudad_natal', 'escuela_id'];

    // Relación con el modelo Escuela
    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }
}
