@extends('layouts.app')

@section('title', 'Ordenes | Crear')

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
                Crear orden
            </div>
            <div class="card-body">
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <div class="row">
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <label for="">Área</label>
                                <div class="select-area-container">
                                    <select name="area_id" id="select-area" class="form-control">
                                        <option></option>
                                        @foreach($areas as $area)
                                        <option @selected(old('area') == $area->id) value="{{ $area->id }}">{{ $area->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="form-group">
                                <label for="">Jefe Inmediato</label>
                                <input type="text" class="form-control" name="jefeinmediato" value="{{ old('jefeinmediato') }}">
                                @error('jefeinmediato')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">

    // Controles
    const selectArea = $('#select-area');

    $(document).ready(function() {

        selectArea.select2({
            width: 'element',
            placeholder: 'SELECCIONE',
        });

    });

</script>

@endsection