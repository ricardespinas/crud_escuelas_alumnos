@extends('layouts.app')

@section('content')
    <div class="container">
        
        <h1>Escuelas</h1>
        <a href="{{ route('escuelas.create') }}" class="btn btn-primary">Agregar Escuela</a>
        
        <hr style="margin:50px;">
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Logotipo</th>
                    <th>Página web</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($escuelas as $escuela)
                    <tr>
                        <td>{{ $escuela->nombre }}</td>
                        <td>{{ $escuela->direccion }}</td>
                        <td>{{ $escuela->correo_electronico }}</td>
                        <td>{{ $escuela->telefono }}</td>
                        <td>
                            @if ($escuela->logotipo)
                                <img src="{{ asset('logotipos/'.$escuela->id. '/' . $escuela->logotipo) }}" alt="{{ $escuela->nombre }}" title="{{ $escuela->nombre }}" width="100">
                            @else
                                <img src="{{ asset('logotipos/no-image.jpeg') }}" alt="Not found" width="100">
                            @endif
                        </td>
                        <td>{{ $escuela->pagina_web }}</td>
                        <td>
                            <a href="{{ route('escuelas.show', $escuela->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('escuelas.edit', $escuela->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('escuelas.destroy', $escuela->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta escuela?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $escuelas->links() }}
    </div>
@endsection
