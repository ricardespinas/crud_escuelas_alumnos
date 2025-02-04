<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Escuela;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $currentPage = request('page', 1);
        
        $alumnos = Alumno::with('escuela')->paginate(10);
        return view('alumnos.index', compact('alumnos', 'currentPage'));
    }

    public function create()
    {
        $escuelas = Escuela::all();
        return view('alumnos.create', compact('escuelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'escuela_id' => 'required|exists:escuelas,id',
            'ciudad_natal' => 'nullable',
        ]);

        Alumno::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'escuela_id' => $request->escuela_id,
            'ciudad_natal' => $request->ciudad_natal,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente.');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Request $request, Alumno $alumno)
    {
        $currentPage = request('page', 1);
        $escuelas = Escuela::all();
        return view('alumnos.edit', compact('alumno', 'escuelas', 'currentPage'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'escuela_id' => 'required|exists:escuelas,id',
            'ciudad_natal' => 'nullable',
        ]);

        $alumno->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'escuela_id' => $request->escuela_id,
            'ciudad_natal' => $request->ciudad_natal,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
}
