@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultados de búsqueda</h1>
    @if($cursos->isEmpty())
        <p>No se encontraron cursos.</p>
    @else
        <div class="row">
            @foreach($cursos as $curso)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $curso->nombre }}</h5>
                            <p class="card-text">{{ $curso->descripcion }}</p>
                            <a href="/cursos/{{ $curso->id }}" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
