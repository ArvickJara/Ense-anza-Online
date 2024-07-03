@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Curso</h1>
    <form action="/cursos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" class="form-control" id="categoria" name="categoria" required>
        </div>
        <div class="form-group">
            <label for="materiales">Materiales</label>
            <input type="file" class="form-control" id="materiales" name="materiales">
        </div>
        <div class="form-group">
            <label for="conocimientos_previos">Conocimientos Previos</label>
            <textarea class="form-control" id="conocimientos_previos" name="conocimientos_previos"></textarea>
        </div>
        <div class="form-group">
            <label for="herramientas">Herramientas</label>
            <textarea class="form-control" id="herramientas" name="herramientas"></textarea>
        </div>
        <div class="form-group">
            <label for="videos">Videos</label>
            <input type="file" class="form-control" id="videos" name="videos">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
