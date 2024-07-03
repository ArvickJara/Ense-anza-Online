@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>
    <form action="/cursos/{curso}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $curso->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $curso->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $curso->categoria }}" required>
        </div>
        <div class="form-group">
            <label for="materiales">Materiales</label>
            <input type="file" class="form-control" id="materiales" name="materiales">
        </div>
        <div class="form-group">
            <label for="conocimientos_previos">Conocimientos Previos</label>
            <textarea class="form-control" id="conocimientos_previos" name="conocimientos_previos">{{ $curso->conocimientos_previos }}</textarea>
        </div>
        <div class="form-group">
            <label for="herramientas">Herramientas</label>
            <textarea class="form-control" id="herramientas" name="herramientas">{{ $curso->herramientas }}</textarea>
        </div>
        <div class="form-group">
            <label for="videos">Videos</label>
            <input type="file" class="form-control" id="videos" name="videos">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
