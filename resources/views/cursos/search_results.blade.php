@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultados de la Búsqueda</h1>
    <div class="row">
        @forelse($cursos as $curso)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $curso->nombre }}</h5>
                        <p class="card-text">{{ $curso->descripcion }}</p>
                        <a href="{{ url('/cursos/' . $curso->id) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <p>No se encontraron cursos.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
