@extends('layouts.app')

@section('title', 'Usuarios | Listar')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Listado de usuarios
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-end">Agregar</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection