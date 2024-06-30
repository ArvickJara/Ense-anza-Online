@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>IA</td>
                <td>Descripción del curso</td>
                <td>S/99.99</td>
                <td>
                    <a href="#" class="btn btn-primary">Ver</a>
                    <a href="#" class="btn btn-secondary">Editar</a>
                    <a href="#" class="btn btn-danger">Eliminar inscripción</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
