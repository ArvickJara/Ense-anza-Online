@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>
    <a href="/cursos/create" class="btn btn-primary">Crear Curso</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->descripcion }}</td>
                <td>
                    <a href="/cursos/{{ $curso->id }}" class="btn btn-info">Ver</a>
                    <a href="/cursos/{{ $curso->id }}/edit" class="btn btn-warning">Editar</a>
                    <form action="/cursos/{{ $curso->id }}" method="POST" style="display:inline;">
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
