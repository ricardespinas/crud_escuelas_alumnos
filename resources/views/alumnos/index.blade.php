@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Alumnos</h1>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Agregar Alumno</a>
        
        <hr style="margin:50px;">
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Escuela</th>
                    <th>Fecha Nacimiento</th>
                    <th>Ciudad Natal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ optional($alumno->escuela)->nombre }}</td>
                        <td>{{ $alumno->fecha_nacimiento }}</td>
                        <td>{{ $alumno->ciudad_natal }}</td>
                        <td>
                            <a href="{{ route('alumnos.show', $alumno->id) }}{{ request()->get('page') ? '?page=' . request('page') : '' }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('alumnos.edit', $alumno->id) }}{{ request()->get('page') ? '?page=' . request('page') : '' }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Agregar paginación -->
        <div class="d-flex justify-content-center">
            {{ $alumnos->links() }}
        </div>
    </div>
@endsection
