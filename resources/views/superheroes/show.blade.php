@extends('layouts.app')

@section('title', 'Detalles del Superhéroe')

@section('content')

<div class="detail-container">

    <a href="{{ route('superheroes.index') }}" class="back-link">
        ← Regresar al listado
    </a>

    <div class="detail-card">

        <div class="detail-image">
            @if($superhero->foto_url)
                <img src="{{ $superhero->foto_url }}"
                     alt="{{ $superhero->nombre_heroe }}">
            @else
                <div class="detail-no-image">
                    Sin fotografía
                </div>
            @endif
        </div>

        <div class="detail-info">

            <span class="detail-label">SUPERHÉROE</span>

            <h1>{{ $superhero->nombre_heroe }}</h1>

            <h3>Nombre real</h3>
            <p>{{ $superhero->nombre_real }}</p>

            <h3>Información adicional</h3>
            <p>
                {{ $superhero->informacion ?: 'No hay información adicional.' }}
            </p>

            <div class="detail-dates">
                <p>Registrado: {{ $superhero->created_at->format('d/m/Y') }}</p>
            </div>

            <div class="detail-actions">

                <a href="{{ route('superheroes.edit', $superhero->id) }}"
                   class="btn-edit">
                    Editar
                </a>

                <a href="{{ route('superheroes.index') }}" class="btn-cancel">
                    Volver
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
