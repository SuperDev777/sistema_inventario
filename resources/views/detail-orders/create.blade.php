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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Detalle de la orden
            </div>
            <div class="card-body">
                <form action="{{ route('detailOrders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                    <input type="hidden" value="{{ $order->id }}" name="order_id">
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}" autocomplete="off">
                                @error('cantidad')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Unidad medida</label>
                                <input type="text" class="form-control" name="unidadmedida" value="{{ old('unidadmedida') }}" autocomplete="off">
                                @error('unidadmedida')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" autocomplete="off">
                                @error('descripcion')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        <button type="reset" class="btn btn-danger">Limpiar</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="table-detail-orders" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <th>CANTIDAD</th>
                            <th>UNIDAD MEDIDA</th>
                            <th>DESCRIPCIÓN</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($order->detailOrders as $detail)
                            <tr>
                                <td>{{ $detail->cantidad }}</td>
                                <td>{{ $detail->unidadmedida }}</td>
                                <td>{{ $detail->descripcion }}</td>
                                <td>
                                    <form action="{{ route('detailOrders.destroy', $detail->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection


