@extends('layouts.app')

@section('title', 'Recepciones | Ver')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                Recepción N° {{ $received->id }}
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Recepción Número</label>
                                <input type="text" class="form-control" value="{{ $received->id }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Área</label>
                                <input type="text" class="form-control" value="{{ $received->area->nombre }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Jefe Inmediato</label>
                                <input type="text" class="form-control" name="jefeinmediato" value="{{ $received->jefeinmediato }}" disabled>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">
                Detalle de la recepción
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-detail-orders" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <th>CANTIDAD</th>
                            <th>UNIDAD MEDIDA</th>
                            <th>DESCRIPCIÓN</th>
                        </thead>
                        <tbody>
                            @foreach($received->detailReceived as $detail)
                            <tr>
                                <td>{{ $detail->cantidad }}</td>
                                <td>{{ $detail->unidadmedida }}</td>
                                <td>{{ $detail->descripcion }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mb-3">
        <a href="{{ route('receives.edit', $received->id) }}" class="btn btn-primary w-100">Editar</a>
    </div>
    <div class="col-12 col-md-6">
        <a href="{{ route('receives.index') }}" class="btn btn-danger w-100">Cancelar</a>
    </div>
</div>
@endsection

