<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Escuela;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $escuela = Escuela::first();  // Suponemos que ya existe al menos una escuela
        $segundaEscuela = Escuela::skip(1)->first(); // Salta la primera y obtiene la segunda
        $terceraEscuela = Escuela::skip(2)->first(); // Salta las dos primeras y obtiene la tercera


        Alumno::create([
            'nombre' => 'Ricard',
            'apellidos' => 'Espinàs',
            'escuela_id' => $escuela->id,
            'fecha_nacimiento' => '1987-11-26',
            'ciudad_natal' => 'Oliana',
        ]);

        Alumno::create([
            'nombre' => 'Jaume',
            'apellidos' => 'Mosella',
            'escuela_id' => $segundaEscuela->id,
            'fecha_nacimiento' => '1987-11-26',
            'ciudad_natal' => 'Oliana',
        ]);

        Alumno::create([
            'nombre' => 'Jordi',
            'apellidos' => 'Espinàs',
            'escuela_id' => $terceraEscuela->id,
            'fecha_nacimiento' => '1984-09-05',
            'ciudad_natal' => 'Barcelona',
        ]);

        Alumno::create([
            'nombre' => 'Adrià',
            'apellidos' => 'Puntí',
            'escuela_id' => $escuela->id,
            'fecha_nacimiento' => '1982-11-21',
            'ciudad_natal' => 'Girona',
        ]);

        Alumno::create([
            'nombre' => 'Tomeu',
            'apellidos' => 'Penya',
            'escuela_id' => $segundaEscuela->id,
            'fecha_nacimiento' => '1987-11-26',
            'ciudad_natal' => 'Mallorca',
        ]);

        Alumno::create([
            'nombre' => 'Antonia',
            'apellidos' => 'Font',
            'escuela_id' => $terceraEscuela->id,
            'fecha_nacimiento' => '1990-11-26',
            'ciudad_natal' => 'Mallorca',
        ]);

        Alumno::create([
            'nombre' => 'Marc',
            'apellidos' => 'Roca',
            'escuela_id' => $escuela->id,
            'fecha_nacimiento' => '1985-05-11',
            'ciudad_natal' => 'Mallorca',
        ]);

        Alumno::create([
            'nombre' => 'Xavier',
            'apellidos' => 'Pinós',
            'escuela_id' => $segundaEscuela->id,
            'fecha_nacimiento' => '1980-04-26',
            'ciudad_natal' => 'Barcelona',
        ]);

        Alumno::create([
            'nombre' => 'David',
            'apellidos' => 'Codina',
            'escuela_id' => $terceraEscuela->id,
            'fecha_nacimiento' => '1985-01-05',
            'ciudad_natal' => 'Lleida',
        ]);

        Alumno::create([
            'nombre' => 'Anna',
            'apellidos' => 'Llovet',
            'escuela_id' => $escuela->id,
            'fecha_nacimiento' => '1982-06-11',
            'ciudad_natal' => 'Mallorca',
        ]);

        Alumno::create([
            'nombre' => 'Júlia',
            'apellidos' => 'Matadepera',
            'escuela_id' => $segundaEscuela->id,
            'fecha_nacimiento' => '1981-04-26',
            'ciudad_natal' => 'Barcelona',
        ]);

        Alumno::create([
            'nombre' => 'Mercè',
            'apellidos' => 'Feliu',
            'escuela_id' => $terceraEscuela->id,
            'fecha_nacimiento' => '1989-01-05',
            'ciudad_natal' => 'Hospitalet',
        ]);
    }
}
