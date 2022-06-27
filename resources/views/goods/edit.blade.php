@extends('layouts.app')

@section('title', 'Articulos | Editar')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                Crear articulos
            </div>
            <div class="card-body">
                <form action="{{ route('goods.update') }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                    <input type="hidden" value="{{ $good->id }}" name="id">
                    <div class="form-group">
                        <label for="">Codigo</label>
                        <input type="number" class="form-control" name="codigo" value="{{ old('codigo', $good->codigo) }}">
                        @error('codigo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tipo:</label>
                        <select name="tipo" id="tipo" class="form-select">
                            <option selected disabled>Seleccione el tipo de articulo:</option>
                            <option value="escritorio" @selected(old('tipo', $good->tipo) == 'escritorio')>utiles de escritorio</option>
                            <option value="limpieza" @selected(old('tipo', $good->tipo) == 'limpieza')>limpieza</option>
                            <option value="herramienta" @selected(old('tipo', $good->tipo) == 'herramienta')>herramientas</option>
                            <option value="red" @selected(old('tipo', $good->tipo) == 'red')>red</option>
                        </select>
                        @error('tipo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Marca</label>
                        <input type="text" class="form-control" name="marca" value="{{ old('marca', $good->marca) }}">
                        @error('marca')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $good->descripcion) }}">
                        @error('descripcion')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock', $good->stock) }}">
                        @error('stock')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('goods.index') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection