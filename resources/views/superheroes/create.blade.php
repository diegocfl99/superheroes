@extends('layouts.app')

@section('title', 'Registrar Superhéroe')

@section('content')

<div class="form-container">

    <h1>Registrar Superhéroe</h1>
    <p class="form-description">Completa los datos del nuevo integrante.</p>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superheroes.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label>Nombre real</label>
            <input type="text" name="nombre_real"
                   value="{{ old('nombre_real') }}"
                   placeholder="Ej. Peter Parker" required>
        </div>

        <div class="form-group">
            <label>Nombre de superhéroe</label>
            <input type="text" name="nombre_heroe"
                   value="{{ old('nombre_heroe') }}"
                   placeholder="Ej. Spider-Man" required>
        </div>

        <div class="form-group">
            <label>URL de fotografía</label>
            <input type="url" name="foto_url"
                   value="{{ old('foto_url') }}"
                   placeholder="https://ejemplo.com/foto.jpg">
        </div>

        <div class="form-group">
            <label>Información adicional</label>
            <textarea name="informacion" rows="5"
                      placeholder="Describe al superhéroe...">{{ old('informacion') }}</textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-primary">
                Guardar superhéroe
            </button>

            <a href="{{ route('superheroes.index') }}" class="btn-cancel">
                Cancelar
            </a>
        </div>

    </form>

</div>

@endsection
