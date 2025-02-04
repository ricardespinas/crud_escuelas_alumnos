@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('alumnos.index', ['page' => request('page', 1)]) }}" class="btn btn-secondary">
            Volver a la lista
        </a>

        <h1>Detalles del Alumno: {{ $alumno->nombre }}</h1>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $alumno->nombre }}</h5>
                <p class="card-text"><strong>Apellidos:</strong> {{ $alumno->apellidos }}</p>
                <p class="card-text"><strong>Escuela:</strong> {{ optional($alumno->escuela)->nombre ?? 'No disponible' }}</p>
                <p class="card-text"><strong>Fecha Nacimiento:</strong> {{ $alumno->fecha_nacimiento ?? 'No disponible' }}</p>
                <p class="card-text"><strong>Ciudad natal:</strong> {{ $alumno->ciudad_natal ?? 'No disponible' }}</p>

                <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-primary">Editar</a>
                <hr>
                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
