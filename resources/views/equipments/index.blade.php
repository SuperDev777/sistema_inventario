@extends('layouts.app')

@section('title', 'Equipos | Listar')

@section('content')

<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Listado de equipos
                <a href="{{ route('equipments.create') }}" class="btn btn-success btn-sm float-end">Agregar</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sede</th>
                            <th>Área</th>
                            <th>Piso</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>N° Serie</th>
                            <th>MAC</th>
                            <th>Procesador</th>
                            <th>RAM</th>
                            <th>Capacidad Disco</th>
                            <th>S. O.</th>
                            <th>Adquisición</th>
                            <th>Stock</th>
                            <th>Observación</th>
                        </thead>
                        <tbody>
                            @foreach($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->sede }}</td>
                                <td>{{ $equipment->area }}</td>
                                <td>{{ $equipment->piso }}</td>
                                <td>{{ $equipment->codigo }}</td>
                                <td>{{ $equipment->tipo }}</td>
                                <td>{{ $equipment->marca }}</td>
                                <td>{{ $equipment->modelo }}</td>
                                <td>{{ $equipment->numserie }}</td>
                                <td>{{ $equipment->mac }}</td>
                                <td>{{ $equipment->procesador }}</td>
                                <td>{{ $equipment->ram }}</td>
                                <td>{{ $equipment->capacidaddisco }}</td>
                                <td>{{ $equipment->sistemaoperativo }}</td>
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