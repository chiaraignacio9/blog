@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Listado de Categorias</h1>
@stop

@section('content')

    @if (session()->has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{session('mensaje')}}
    </div>
    @endif

    <div class="card">

        <div class="card-header">
            <a class="btn btn-secondary btn" href="{{ route('admin.categories.create') }}">Agregar Categoría</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

