@extends('layouts.app')

@section('title', 'Usuarios | Editar')

@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Editar usuario
                <a href="" class="btn btn-success btn-sm float-end">Agregar</a>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update') }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                    <div class="form-group">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password" value="{{ old('password', $user->password) }}">
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection