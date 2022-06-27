@extends('layouts.app')

@section('title', 'Ordenes | Crear')

@section('content')
<div class="row">
    <div class="col-md-12 mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                Orden N° {{ $order->id }}
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Orden Número</label>
                                <input type="text" class="form-control" value="{{ $order->id }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Área</label>
                                <input type="text" class="form-control" value="{{ $order->area->nombre }}" disabled>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Jefe Inmediato</label>
                                <input type="text" class="form-control" name="jefeinmediato" value="{{ $order->jefeinmediato }}" disabled>
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
                Detalle de la orden
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
                            @foreach($order->detailOrders as $detail)
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
        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary w-100">Editar</a>
    </div>
    <div class="col-12 col-md-6">
        <a href="{{ route('orders.index') }}" class="btn btn-danger w-100">Cancelar</a>
    </div>
</div>
@endsection

