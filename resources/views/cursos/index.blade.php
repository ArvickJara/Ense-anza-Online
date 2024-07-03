@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>
    <a href="/cursos/create" class="btn btn-primary">Crear Curso</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->descripcion }}</td>
                    <td>{{ $curso->categoria }}</td>
                    <td>
                        <a href="/cursos/{curso}" class="btn btn-info">Ver</a>
                        <a href="/cursos/{curso}/edit" class="btn btn-warning">Editar</a>
                        <form action="/cursos/{curso}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
