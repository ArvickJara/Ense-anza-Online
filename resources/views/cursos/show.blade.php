@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $curso->nombre }}</h1>
    <p>{{ $curso->descripcion }}</p>

    @if ($curso->materiales)
        <a href="{{ asset('storage/' . $curso->materiales) }}" class="btn btn-primary">Descargar Materiales</a>
    @endif

    @if ($curso->videos)
        <div>
            <video width="600" controls>
                <source src="{{ asset('storage/' . $curso->videos) }}" type="video/mp4">
                Tu navegador no soporta la reproducción de videos.
            </video>
        </div>
    @endif
</div>
@endsection
