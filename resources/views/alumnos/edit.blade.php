@extends('layouts.app')

@section('extra_head')
    <!-- Agregar Bootstrap-datepicker CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('alumnos.index', ['page' => request('page', 1)]) }}" class="btn btn-secondary">
            Volver a la lista de Alumnos
        </a>

        <hr style="margin:50px;">

        <h1>Editar Alumno: {{ $alumno->nombre }}</h1>

        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $alumno->apellidos) }}" required>
            </div>

            <div class="form-group">
                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" required>
            </div>

            <div class="form-group">
                <label for="ciudad_natal">Ciudad Natal</label>
                <input type="text" name="ciudad_natal" id="ciudad_natal" class="form-control" value="{{ old('ciudad_natal', $alumno->ciudad_natal) }}">
            </div>

            <div class="form-group">
                <label for="escuela_id">Escuela</label>
                <select name="escuela_id" id="escuela_id" class="form-control">
                    <option value="">Selecciona una escuela</option>
                    @foreach ($escuelas as $escuela)
                        <option value="{{ $escuela->id }}" 
                            {{ old('escuela_id', $alumno->escuela_id) == $escuela->id ? 'selected' : '' }}>
                            {{ $escuela->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <hr style="margin:50px;">

            <button type="submit" class="btn btn-success mt-3">Actualizar Alumno</button>
        </form>
    </div>

    

    <!-- Agregar jQuery (necesario para Bootstrap-datepicker) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <!-- Agregar Bootstrap-datepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#fecha_nacimiento').datepicker({
                format: 'yyyy-mm-dd',  // El formato de fecha
                autoclose: true,       // Cierra el calendario después de seleccionar
                todayHighlight: true   // Resalta el día de hoy
            });
        });
    </script>
@endsection
