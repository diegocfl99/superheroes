
@extends('layouts.app')

@section('title', 'Editar Superhéroe')

@section('content')

<div class="form-container">

    <h1>Editar Superhéroe</h1>
    <p class="form-description">Modifica la información del superhéroe.</p>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superheroes.update', $superhero->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre real</label>
            <input type="text" name="nombre_real"
                   value="{{ old('nombre_real', $superhero->nombre_real) }}"
                   required>
        </div>

        <div class="form-group">
            <label>Nombre de superhéroe</label>
            <input type="text" name="nombre_heroe"
                   value="{{ old('nombre_heroe', $superhero->nombre_heroe) }}"
                   required>
        </div>

        <div class="form-group">
            <label>URL de fotografía</label>
            <input type="url" name="foto_url"
                   value="{{ old('foto_url', $superhero->foto_url) }}">
        </div>

        <div class="form-group">
            <label>Información adicional</label>
            <textarea name="informacion" rows="5">{{ old('informacion', $superhero->informacion) }}</textarea>
        </div>

        <div class="form-buttons">

            <button type="submit" class="btn-primary">
                Guardar cambios
            </button>

            <a href="{{ route('superheroes.index') }}" class="btn-cancel">
                Cancelar
            </a>

        </div>

    </form>

</div>

@endsection
