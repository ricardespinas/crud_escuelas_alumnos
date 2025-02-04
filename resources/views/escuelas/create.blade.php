@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Escuela: </h1>

        <form action="{{ route('escuelas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="nombre">Nombre de la escuela</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}" required>
            </div>

            <div class="form-group">
                <label for="correo_electronico">Correo electrónico</label>
                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ old('correo_electronico') }}">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
            </div>

            <div class="form-group">
                <label for="pagina_web">Página web</label>
                <input type="url" name="pagina_web" id="pagina_web" class="form-control" value="{{ old('pagina_web') }}">
            </div>

            <div class="form-group">
                <label for="logotipo">Logotipo</label>
                <input type="file" name="logotipo" id="logotipo" class="form-control">
            </div>
            <hr>

            <button type="submit" class="btn btn-success mt-3">Crear Escuela</button>
        </form>
    </div>
@endsection
