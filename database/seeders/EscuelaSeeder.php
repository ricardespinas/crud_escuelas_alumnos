<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Escuela;

class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Escuela::create([
            'nombre' => 'Technodac',
            'direccion' => 'Calle Ficticia 123',
            'logotipo' => '',
            'correo_electronico' => 'admin@technodac.com',
            'telefono' => '977 24 03 01',
            'pagina_web' => 'https://www.technodac.com/es/'
        ]);

        Escuela::create([
            'nombre' => 'Escola Pia',
            'direccion' => 'Calle Ficticia 111',
            'logotipo' => '',
            'correo_electronico' => 'info@escolapia.com',
            'telefono' => '93 356 47 45 41',
            'pagina_web' => ''
        ]);

        Escuela::create([
            'nombre' => 'Escola Boix',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => 'info@escolaboix.com',
            'telefono' => '97 245 45 47',
            'pagina_web' => ''
        ]);

        Escuela::create([
            'nombre' => 'Escola A',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);

        Escuela::create([
            'nombre' => 'Escola B',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);

        Escuela::create([
            'nombre' => 'Escola C',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);

        Escuela::create([
            'nombre' => 'Escola D',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);
        Escuela::create([
            'nombre' => 'Escola E',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);
        Escuela::create([
            'nombre' => 'Escola F',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);
        Escuela::create([
            'nombre' => 'Escola G',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);
        Escuela::create([
            'nombre' => 'Escola H',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);
        Escuela::create([
            'nombre' => 'Escola I',
            'direccion' => 'Calle Ficticia 3',
            'logotipo' => '',
            'correo_electronico' => '',
            'telefono' => '',
            'pagina_web' => ''
        ]);
    }
}
