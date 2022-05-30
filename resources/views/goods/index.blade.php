@extends('layouts.app')

@section('title', 'Articulos | Listar')

@section('content')

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Listado de usuarios
                <a href="{{ route('goods.create') }}" class="btn btn-success btn-sm float-end">Agregar</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Código</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                    </thead>
                    <tbody>
                        @foreach($goods as $good)
                        <tr>
                            <td>{{ $good->codigo }}</td>
                            <td>{{ $good->tipo }}</td>
                            <td>{{ $good->marca }}</td>
                            <td>{{ $good->descripcion }}</td>
                            <td><a href="{{ route('goods.edit', $good->id) }}" class="btn btn-primary">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection