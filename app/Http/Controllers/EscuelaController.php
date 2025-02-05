<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;  // Importa la fachada File

class EscuelaController extends Controller
{
    public function index()
    {
        $currentPage = request('page', 1);

        // Pagina los resultados de las escuelas
        $escuelas = Escuela::paginate(10);
        return view('escuelas.index', compact('escuelas', 'currentPage'));
    }

    public function create()
    {
        return view('escuelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'logotipo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=200,min_height=200',
            'correo_electronico' => 'nullable|email',
            'telefono' => 'nullable|string|max:255',
            'pagina_web' => 'nullable|url',
        ]);

        $escuela = new Escuela();
        $escuela->nombre = $request->nombre;
        $escuela->direccion = $request->direccion;
        $escuela->correo_electronico = $request->correo_electronico;
        $escuela->telefono = $request->telefono;
        $escuela->pagina_web = $request->pagina_web;

        $escuela->save();

        if ($request->hasFile('logotipo')) {
            $archivo = $request->file('logotipo');
            $nombreArchivo = $archivo->getClientOriginalName(); // Renombrar para evitar conflictos
            $rutaDirectorio = public_path('logotipos' . DIRECTORY_SEPARATOR . $escuela->id . DIRECTORY_SEPARATOR);
            $archivo->move($rutaDirectorio, $nombreArchivo); // Guardar en public/logotipos/id_escuela
            // Cambiar permisos del archivo a 0644 (lectura para todos, escritura solo para el propietario)
            chmod($rutaDirectorio . $nombreArchivo, 0644); 
            $escuela->logotipo = $nombreArchivo; // Guardar la ruta en la BD
        }
        $escuela->save();

        return redirect()->route('escuelas.index')->with('success', 'Escuela creada correctamente');
    }

    public function show(Escuela $escuela)
    {
        return view('escuelas.show', compact('escuela'));
    }

    public function edit(Escuela $escuela)
    {
        return view('escuelas.edit', compact('escuela'));
    }

    public function update(Request $request, Escuela $escuela)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'logotipo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'correo_electronico' => 'nullable|email',
            'telefono' => 'nullable|string|max:255',
            'pagina_web' => 'nullable|url',
        ]);

        $escuela->nombre = $request->nombre;
        $escuela->direccion = $request->direccion;
        $escuela->correo_electronico = $request->correo_electronico;
        $escuela->telefono = $request->telefono;
        $escuela->pagina_web = $request->pagina_web;

        if ($request->hasFile('logotipo')) {
            $archivo = $request->file('logotipo');
            $nombreArchivo = $archivo->getClientOriginalName(); // Renombrar para evitar conflictos
            // Eliminar el logotipo anterior
            $path_file = public_path('logotipos'. DIRECTORY_SEPARATOR . $escuela->id . DIRECTORY_SEPARATOR  . $nombreArchivo);
            $path_folder = public_path('logotipos' . DIRECTORY_SEPARATOR . $escuela->id);
            if ($escuela->logotipo && file_exists($path_file)) {
                // Verificar si la carpeta existe y eliminarla
                if (File::exists($path_folder)) {
                    File::deleteDirectory($path_folder);  // Elimina la carpeta y su contenido
                }
                unlink($path_file);  // Elimina el archivo antiguo
            }
            $archivo->move(public_path('logotipos'. DIRECTORY_SEPARATOR . $escuela->id . DIRECTORY_SEPARATOR ), $nombreArchivo); // Guardar en public/logotipos/id_escuela
            $escuela->logotipo = $nombreArchivo; // Guardar la ruta en la BD
        }

        $escuela->save();

        return redirect()->route('escuelas.index')->with('success', 'Escuela actualizada correctamente');
    }

    public function destroy(Escuela $escuela)
    {
        $escuela->alumnos()->update(['escuela_id' => null]);

        if ($escuela->logotipo) {
            $path_folder = public_path('logotipos' . DIRECTORY_SEPARATOR . $escuela->id);
            if (File::exists($path_folder)) {
                File::deleteDirectory($path_folder);  // Elimina la carpeta y su contenido
            }
        }

        $escuela->delete();

        return redirect()->route('escuelas.index')->with('success', 'Escuela eliminada correctamente');
    }
}
