@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('escuelas.index', ['page' => request('page', 1)]) }}" class="btn btn-secondary">
            Volver a la lista
        </a>

        <hr style="margin:50px;">
        
        <h1>Editar Escuela: {{ $escuela->nombre }}</h1>

        <form action="{{ route('escuelas.update', $escuela->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre de la escuela</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $escuela->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $escuela->direccion) }}" required>
            </div>

            <div class="form-group">
                <label for="correo_electronico">Correo electrónico</label>
                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ old('correo_electronico', $escuela->correo_electronico) }}">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $escuela->telefono) }}">
            </div>

            <div class="form-group">
                <label for="pagina_web">Página web</label>
                <input type="url" name="pagina_web" id="pagina_web" class="form-control" value="{{ old('pagina_web', $escuela->pagina_web) }}">
            </div>

            <div class="form-group">
                <label for="logotipo">Logotipo</label>
                <input type="file" name="logotipo" id="logotipo" class="form-control">
                @if ($escuela->logotipo)
                    <p><strong>Logotipo actual:</strong></p>
                    <img src="{{ asset('logotipos/' . $escuela->id . '/' . $escuela->logotipo) }}" alt="Logotipo actual" width="100">
                @endif
            </div>
            <hr>

            <button type="submit" class="btn btn-success mt-3">Actualizar Escuela</button>
        </form>
    </div>
@endsection
