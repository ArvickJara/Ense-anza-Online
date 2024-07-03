@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $curso->nombre }}</h1>
    <p><strong>Descripción:</strong> {{ $curso->descripcion }}</p>
    <p><strong>Categoría:</strong> {{ $curso->categoria }}</p>
    @if ($curso->materiales)
        <p><strong>Materiales:</strong> <a href="{{ asset('storage/' . $curso->materiales) }}">Descargar PDF</a></p>
    @endif
    <p><strong>Conocimientos Previos:</strong> {{ $curso->conocimientos_previos }}</p>
    <p><strong>Herramientas:</strong> {{ $curso->herramientas }}</p>
    @if ($curso->videos)
        <p><strong>Videos:</strong></p>
        <video width="320" height="240" controls>
            <source src="{{ asset('storage/' . $curso->videos) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif
    <a href="/cursos" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
