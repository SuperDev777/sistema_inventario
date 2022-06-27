@extends('layouts.app')

@section('title', 'Ordenes | Crear')

@section('head')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mt-3 mb-3">
        <div class="card">
            <div class="card-header">
                Orden N° {{ $order->id }}
            </div>
            <div class="card-body">
                <form action="{{ route('orders.update') }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" value="{{ $order->id }}" name="order_id">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
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
                                <div class="select-area-container">
                                    <select name="area_id" id="select-area" class="form-control">
                                        <option></option>
                                        @foreach($areas as $area)
                                        <option @selected(old('area', $order->area_id) == $area->id) value="{{ $area->id }}">{{ $area->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="form-group">
                                <label for="">Jefe Inmediato</label>
                                <input type="text" class="form-control" name="jefeinmediato" value="{{ old('jefeinmediato', $order->jefeinmediato) }}">
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
