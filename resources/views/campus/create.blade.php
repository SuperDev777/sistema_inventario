@extends('layouts.app')

@section('title', 'Sedes | Crear')

@section('head')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                Crear sedes
            </div>
            <div class="card-body">
                <form action="{{ route('campus.store') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                    <div class="row g-2">
                        <div class="col-12 col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" autocomplete="off">
                            @error('nombre')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Departamento</label>
                            <input type="text" class="form-control" name="departamento" value="{{ old('departamento') }}" autocomplete="off">
                            @error('departamento')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Provincia</label>
                            <input type="text" class="form-control" name="provincia" value="{{ old('provincia') }}" autocomplete="off">
                            @error('provincia')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Distrito</label>
                            <input type="text" class="form-control" name="distrito" value="{{ old('distrito') }}" autocomplete="off">
                            @error('distrito')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" autocomplete="off">
                            @error('direccion')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('campus.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script>

</script>

@endsection