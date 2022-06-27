@extends('layouts.app')

@section('title', 'Sedes | Listar')

@section('head')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')

<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                Listado de sedes
                <a href="{{ route('campus.create') }}" class="btn btn-success btn-sm float-end">Nuevo</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('campus.exporExcel') }}" class="btn btn-success">EXCEL</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table-equipments" class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <th>Nombre</th>
                            <th>Departamento</th>
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Dirección</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($campuses as $campus)
                            <tr>
                                <td>{{ $campus->nombre }}</td>
                                <td>{{ $campus->departamento }}</td>
                                <td>{{ $campus->provincia }}</td>
                                <td>{{ $campus->distrito }}</td>
                                <td>{{ $campus->direccion }}</td>
                                <td><a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-primary">Editar</a></td>
                                <td>
                                    <form action="{{ route('campus.destroy', $campus->id) }}" method="POST">
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

