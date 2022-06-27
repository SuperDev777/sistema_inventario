@extends('layouts.app')

@section('title', 'Usuarios | Perfil')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                Perfil usuario
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" value="{{ $user->id }}" name="id">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" name="lastname" value="{{ old('lastname', $user->lastname) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" disabled>
                    </div>
                    <!--
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password" value="{{ old('password') }}" autocomplete="off">
                    </div>
                    -->
                    <div class="form-group mt-2">
                        <button type="button" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection