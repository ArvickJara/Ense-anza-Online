@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Curso</h1>
    <form>
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
