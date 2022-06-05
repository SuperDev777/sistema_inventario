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
                Listado de equipos
                <a href="{{ route('equipments.create') }}" class="btn btn-success btn-sm float-end">Agregar</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('equipments.exporExcel') }}" class="btn btn-success">EXCEL</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table-equipments" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <th>Sede</th>
                            <th>Área</th>
                            <th>Piso</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>N° Serie</th>
                            <th>Adquisición</th>
                            <th>Stock</th>
                            <th>Observación</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->sede()->nombre }}</td>
                                <td>{{ $equipment->area()->nombre }}</td>
                                <td>{{ $equipment->piso }}</td>
                                <td>{{ $equipment->codigo }}</td>
                                <td>{{ $equipment->tipo }}</td>
                                <td>{{ $equipment->marca }}</td>
                                <td>{{ $equipment->modelo }}</td>
                                <td>{{ $equipment->numserie }}</td>
                                <td>{{ $equipment->adquisicion }}</td>
                                <td>{{ $equipment->stock }}</td>
                                <td>{{ $equipment->observacion }}</td>
                                <td><a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-primary">Editar</a></td>
                                <td>
                                    <form action="{{ route('equipments.destroy', $equipment->id) }}" method="POST">
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

