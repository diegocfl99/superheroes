@extends('layouts.app')

@section('title', 'Listado de Superhéroes')

@section('content')

<div class="page-header">
    <div>
        <h1>Universo de Superhéroes</h1>
        <p>Administra y consulta todos los superhéroes registrados.</p>
    </div>

    <a href="{{ route('superheroes.create') }}" class="btn-primary">
        + Nuevo superhéroe
    </a>
</div>

<div class="hero-grid">

    @forelse($superheroes as $superhero)

        <div class="hero-card">

            @if($superhero->foto_url)
                <img src="{{ $superhero->foto_url }}"
                     alt="{{ $superhero->nombre_heroe }}"
                     class="hero-image">
            @else
                <div class="hero-no-image">Sin fotografía</div>
            @endif

            <div class="hero-info">

                <h2>{{ $superhero->nombre_heroe }}</h2>

                <p class="real-name">
                    {{ $superhero->nombre_real }}
                </p>

                <div class="hero-actions">

                    <a href="{{ route('superheroes.show', $superhero->id) }}"
                       class="btn-view">
                        Ver
                    </a>

                    <a href="{{ route('superheroes.edit', $superhero->id) }}"
                       class="btn-edit">
                        Editar
                    </a>

                    <form action="{{ route('superheroes.destroy', $superhero->id) }}"
                          method="POST"
                          onsubmit="return confirm('¿Eliminar este superhéroe?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-delete">
                            Eliminar
                        </button>

                    </form>

                </div>

            </div>
        </div>

    @empty

        <div class="empty-state">
            <h2>Aún no hay superhéroes</h2>
            <p>Registra tu primer superhéroe para comenzar.</p>
            <a href="{{ route('superheroes.create') }}" class="btn-primary">
                Registrar superhéroe
            </a>
        </div>

    @endforelse

</div>

@endsection
