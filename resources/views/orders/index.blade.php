@extends('layouts.app')

@section('title', 'Ordenes | Listar')

@section('head')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')

<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                Listado de ordenes
                <a href="{{ route('orders.create') }}" class="btn btn-success btn-sm float-end">Nuevo</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('orders.exporExcel') }}" class="btn btn-success">EXCEL</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table-orders" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <th>NÚMERO</th>
                            <th>ÁREA</th>
                            <th>JEFE INMEDIATO</th>
                            <th>REGISTRADO/ACTUALIZADO POR</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->area->nombre }}</td>
                                <td>{{ $order->jefeinmediato }}</td>
                                <td>{{ $order->user->name }} {{ $order->user->lastname }}</td>
                                <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">Ver</a></td>
                                <td>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    const tableOrders = $('#table-orders')

    $(document).ready(function () {
        tableOrders.DataTable({
            lengthMenu: [5, 10, 25]
        });
    });

</script>

@endsection

