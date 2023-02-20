@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')

    <a class="btn btn-secondary float-right" href="{{route('admin.tags.create')}}">Nuevo Tag</a>

    <h1>Listado de Tags</h1>
@stop

@section('content')

@if (session()->has('mensaje'))
    <div class="alert alert-success" role="alert">
        {{session('mensaje')}}
    </div>
    @endif

    <div class="card">
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
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}">Editar</a></td>
                            <td width="10px">
                                <form action="{{route('admin.tags.destroy', $tag)}}" method="post">
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


