@extends('layouts.app')

@section('title', 'Articulos | Crear')

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
                Crear articulos
            </div>
            <div class="card-body">
                <form action="{{ route('goods.store') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                    <div class="form-group">
                        <label for="">Codigo</label>
                        <input type="number" class="form-control" name="codigo" value="{{ old('codigo') }}">
                        @error('codigo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tipo:</label>
                        <select name="tipo" id="select-tipo" class="form-control">
                            <option selected disabled></option>
                            <option value="ESCRITORIO" @selected(old('tipo') == 'ESCRITORIO')>UTILIES DE ESCRITORIO</option>
                            <option value="LIMPIEZA" @selected(old('tipo') == 'LIMPIEZA')>LIMPIEZA</option>
                            <option value="HERRAMIENTAS" @selected(old('tipo') == 'HERRAMIENTAS')>HERRAMIENTAS</option>
                            <option value="RED" @selected(old('tipo') == 'RED')>RED</option>
                        </select>
                        @error('tipo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Marca</label>
                        <input type="text" class="form-control" name="marca" value="{{ old('marca') }}">
                        @error('marca')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">
                        @error('descripcion')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
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

@section('js')

<script>
    const selectTipo = $('#select-tipo');

    $(document).ready(function() {

        selectTipo.select2({
            width: 'element',
            placeholder: 'SELECCIONE',
            tags: true
        });

    });
</script>

@endsection