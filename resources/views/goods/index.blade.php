@extends('layouts.app')

@section('title', 'Articulos | Listar')

@section('head')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

@endsection

@section('content')

<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                Listado de articulos
                <a href="{{ route('goods.create') }}" class="btn btn-success btn-sm float-end">Nuevo</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ route('goods.exporExcel') }}" class="btn btn-success">EXCEL</a>
                    </div>
                </div>
                <table id="table-goods" class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <th>Código</th>
                        <th>Tipo</th>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th>Stock</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($goods as $good)
                        <tr>
                            <td>{{ $good->codigo }}</td>
                            <td>{{ $good->tipo }}</td>
                            <td>{{ $good->marca }}</td>
                            <td>{{ $good->descripcion }}</td>
                            <td>{{ $good->stock }}</td>
                            <td><a href="{{ route('goods.edit', $good->id) }}" class="btn btn-primary">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
    const tableGoods = $('#table-goods')

    $(document).ready(function () {
        tableGoods.DataTable({
            lengthMenu: [5, 10, 25]
        });
    });

</script>

@endsection