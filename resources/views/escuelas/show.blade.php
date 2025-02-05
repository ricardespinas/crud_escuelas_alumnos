@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('escuelas.index', ['page' => request('page', 1)]) }}" class="btn btn-secondary">
            Volver a la lista de Escuelas
        </a>

        <hr style="margin:50px;">
        
        <h1>Detalles de la Escuela: {{ $escuela->nombre }}</h1>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $escuela->nombre }}</h5>
                <p class="card-text"><strong>Dirección:</strong> {{ $escuela->direccion }}</p>
                <p class="card-text"><strong>Correo electrónico:</strong> {{ $escuela->correo_electronico ?? 'No disponible' }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $escuela->telefono ?? 'No disponible' }}</p>
                <p class="card-text"><strong>Página web:</strong> <a href="{{ $escuela->pagina_web }}" target="_blank">{{ $escuela->pagina_web ?? 'No disponible' }}</a></p>

                <p>
                    <strong>Logotipo:</strong><br>
                    @if ($escuela->logotipo)
                        <img src="{{ asset('logotipos/'.$escuela->id. '/' . $escuela->logotipo) }}" alt="{{ $escuela->nombre }}" title="{{ $escuela->nombre }}" width="100">
                    @else
                        <img src="{{ asset('logotipos/no-image.jpeg') }}" alt="Not found" width="100">
                    @endif
                </p>

                <a href="{{ route('escuelas.edit', $escuela->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('escuelas.destroy', $escuela->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta escuela?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
