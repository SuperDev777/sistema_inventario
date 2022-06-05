@extends('layouts.app')

@section('title', 'Equipos | Listar')

@section('head')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Listado de ordenes
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table id="table-equipments" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <th>Área</th>
                            <th>JEFE INMEDIATO</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->area }}</td>
                                <td>{{ $order->jefeinmediato }}</td>
                                <td><a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Editar</a></td>
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
    const tableEquipments = $('#table-equipments')

    $(document).ready(function () {
        tableEquipments.DataTable({
            lengthMenu: [5, 10, 25]
        });
    });

</script>

@endsection

