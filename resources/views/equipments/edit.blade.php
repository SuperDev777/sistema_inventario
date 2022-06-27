@extends('layouts.app')

@section('title', 'Equipos | Editar')

@section('head')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                Editar equipos
            </div>
            <div class="card-body">
                <form action="{{ route('equipments.store') }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <input type="hidden" value="{{ $equipment->id }}" name="id">
                    <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                    <div class="row g-2">
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Sede</label>
                            <div>
                                <select class="form-control" id="select-sede" name="campus_id">
                                    <option></option>
                                    @foreach ($campuses as $campus)
                                    <option @selected(old('campus_id', $equipment->campus_id) == $campus->id) value="{{ $campus->id }}">{{ $campus->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('campus_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Código</label>
                            <input type="text" class="form-control" id="input-codigo" placeholder="codigo" name="codigo" value="{{ old('codigo', $equipment->codigo) }}">
                            @error('codigo')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Tipo</label>
                            <div>
                                <select class="form-control" id="select-tipo" onchange="validarTipo();" name="tipo">
                                    <option></option>
                                    <option @selected(old('tipo', $equipment->tipo) == 'LAPTOP') value="LAPTOP">LAPTOP</option>
                                    <option @selected(old('tipo', $equipment->tipo) == 'DESKTOP') value="DESKTOP">DESKTOP</option>
                                    <option @selected(old('tipo', $equipment->tipo) == 'TECLADO') value="TECLADO">TECLADO</option>
                                    <option @selected(old('tipo', $equipment->tipo) == 'MOUSE') value="MOUSE">MOUSE</option>
                                    <option @selected(old('tipo', $equipment->tipo) == 'CARGADOR') value="CARGADOR">CARGADOR</option>
                                </select>
                                @error('tipo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Marca</label>
                            <div>
                                  <select class="form-control" id="select-marca" name="marca">
                                    <option></option>
                                    <option selected value="{{ $equipment->marca }}">{{ $equipment->marca }}</option>
                                    <option value="DELL">DELL</option>
                                    <option value="HP">HP</option>
                                    <option value="LENOVO">LENOVO</option>
                                    <option value="ASUS">ASUS</option>
                                  </select>
                                  @error('marca')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Modelo</label>
                            <div>
                                  <select class="form-control" id="select-modelo" name="modelo">
                                    <option></option>
                                    <option selected value="{{ $equipment->modelo }}">{{ $equipment->modelo }}</option>
                                  </select>
                                  @error('modelo')
                                  <span class="text-danger">{{ $message }}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">N° Serie</label>
                            <input type="text" class="form-control" id="input-serie" placeholder="n° serie" name="numserie" value="{{ old('numserie', $equipment->numserie) }}">
                            @error('numserie')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">MAC</label>
                            <input type="text" class="form-control" id="input-mac" placeholder="MAC" name="mac" value="{{ old('mac', $equipment->mac) }}">
                            @error('mac')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Procesador</label>
                            <div>
                                  <select class="form-control" id="select-procesador" name="procesador">
                                    <option></option>
                                    <option selected value="{{ $equipment->procesador }}">{{ $equipment->procesador }}</option>
                                    <option value="NINGUNO">NINGUNO</option>
                                    <option value="1">128 GB</option>
                                    <option value="2">250 GB</option>
                                    <option value="2">500 GB</option>
                                    <option value="2">512 GB</option>
                                    <option value="2">1 TB</option>
                                    <option value="2">2 TB</option>
                                </select>
                                @error('procesador')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">RAM</label>
                            <div>
                                  <select class="form-control" id="select-ram" name="ram">
                                    <option></option>
                                    <option selected value="{{ $equipment->ram }}">{{ $equipment->ram }}</option>
                                    <option value="NINGUNO">NINGUNO</option>
                                    <option value="2 GB">2 GB</option>
                                    <option value="4 GB">4 GB</option>
                                    <option value="6 GB">6 GB</option>
                                    <option value="8 GB">8 GB</option>
                                    <option value="12 GB">12 GB</option>
                                    <option value="16 GB">16 GB</option>
                                    <option value="32 GB">32 GB</option>
                                    <option value="64 GB">64 GB</option>
                                </select>
                                @error('ram')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Tipo Disco</label>
                            <div>
                                  <select class="form-control" id="select-tipo-disco" name="tipodisco">
                                    <option></option>
                                    <option @selected(old('tipodisco', $equipment->tipodisco) == 'NINGUNO') value="NINGUNO">NINGUNO</option>
                                    <option @selected(old('tipodisco', $equipment->tipodisco) == 'SSD') value="SSD">SSD</option>
                                    <option @selected(old('tipodisco', $equipment->tipodisco) == 'MECANICO') value="MECANICO">MECANICO</option>
                                </select>
                                @error('tipodisco')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Capacidad Disco</label>
                            <div>
                                  <select class="form-control" id="select-capacidad-disco" name="capacidaddisco">
                                    <option></option>
                                    <option selected value="{{ $equipment->capacidaddisco }}">{{ $equipment->capacidaddisco }}</option>
                                    <option value="NINGUNO">NINGUNO</option>
                                    <option value="128 GB">128 GB</option>
                                    <option value="250 GB">250 GB</option>
                                    <option value="500 GB">500 GB</option>
                                    <option value="512 GB">512 GB</option>
                                    <option value="1 TB">1 TB</option>
                                    <option value="2 TB">2 TB</option>
                                </select>
                                @error('capacidaddisco')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Sistema Operativo</label>
                            <div>
                                <select class="form-control" id="select-sistema-operativo" name="sistemaoperativo">
                                    <option></option>
                                    <option selected value="{{ $equipment->sistemaoperativo }}">{{ $equipment->sistemaoperativo }}</option>
                                    <option value="NINGUNO">NINGUNO</option>
                                    <optgroup label="WINDOWS">
                                        <option value="Windows 7 home">Windows 7 home</option>
                                        <option value="Windows 7 pro">Windows 7 pro</option>
                                        <option value="Windows 8 home">Windows 8 home</option>
                                        <option value="Windows 8 pro">Windows 8 pro</option>
                                        <option value="Windows 10 home">Windows 10 home</option>
                                        <option value="Windows 10 pro">Windows 10 pro</option>
                                        <option value="Windows 11 home">Windows 11 home</option>
                                        <option value="Windows 11 pro">Windows 11 pro</option>
                                    </optgroup>
                                    <optgroup label="MAC OS">
                                        <option value="1">Windows 7 home</option>
                                        <option value="1">Windows 7 pro</option>
                                        <option value="1">Windows 8 home</option>
                                        <option value="1">Windows 8 pro</option>
                                        <option value="1">Windows 10 home</option>
                                        <option value="1">Windows 10 pro</option>
                                        <option value="1">Windows 11 home</option>
                                        <option value="1">Windows 11 pro</option>
                                    </optgroup>
                                    <optgroup label="LINUX">
                                        <option value="1">Windows 7 home</option>
                                        <option value="1">Windows 7 pro</option>
                                        <option value="1">Windows 8 home</option>
                                        <option value="1">Windows 8 pro</option>
                                        <option value="1">Windows 10 home</option>
                                        <option value="1">Windows 10 pro</option>
                                        <option value="1">Windows 11 home</option>
                                        <option value="1">Windows 11 pro</option>
                                    </optgroup>
                                </select>
                                @error('sistemaoperativo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="" class="form-label">Adquisición</label>
                            <input type="text" class="form-control" id="input-adquisicion" placeholder="adquisicion" name="adquisicion" value="{{ old('adquisicion', $equipment->adquisicion) }}">
                            @error('adquisicion')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Observación</label>
                            <input type="text" class="form-control" id="input-observacion" placeholder="observacion" name="observacion" value="{{ old('observacion', $equipment->observacion) }}">
                            @error('observacion')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('equipments.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

    // Controles
    const selectSede = $('#select-sede');
    const selectArea = $('#select-area');
    const selectTipo = $('#select-tipo');
    const inputSerie = $('#input-serie');
    const selectMarca = $('#select-marca');
    const selectModelo = $('#select-modelo');
    const selectRam = $('#select-ram');
    const inputMac = $('#input-mac');
    const selectTipoDisco = $('#select-tipo-disco');
    const selectCapacidadDisco = $('#select-capacidad-disco');
    const selectProcesador = $('#select-procesador');
    const selectSistemaOperativo = $('#select-sistema-operativo');

    $(document).ready(function() {

        $('#select-sede').select2({
            width: 'element',
            placeholder: 'sede',
            tags: true
        });

        $('#select-area').select2({
            width: 'element',
            placeholder: 'área',
            tags: true
        });

        $('#select-tipo').select2({
            width: 'element',
            placeholder: 'tipo'
        });

        $('#select-marca').select2({
            width: 'element',
            placeholder: 'marca',
            tags: true
        });

        $('#select-modelo').select2({
            width: 'element',
            placeholder: 'modelo',
            tags: true
        });

        $('#select-ram').select2({
            width: 'element',
            placeholder: 'ram'
        });

        $('#select-tipo-disco').select2({
            width: 'element',
            placeholder: 'tipo de disco'
        });

        $('#select-capacidad-disco').select2({
            width: 'element',
            placeholder: 'capacidad de disco'
        });

        $('#select-procesador').select2({
            width: 'element',
            placeholder: 'procesador'
        });

        $('#select-sistema-operativo').select2({
            width: 'element',
            placeholder: 'sistema operativo'
        });

    });

    function validarTipo() {
        const tipo = selectTipo.val();

        if(tipo == 'DESKTOP' || tipo == 'LAPTOP'){
            selectRam.val(null).trigger('change');
            selectTipoDisco.val(null).trigger('change');
            selectCapacidadDisco.val(null).trigger('change');
            selectProcesador.val(null).trigger('change');
            selectSistemaOperativo.val(null).trigger('change');
            inputMac.val('');
            inhabilitarControles(false);
        }else{
            selectRam.val('NINGUNO');
            selectRam.trigger('change');
            selectTipoDisco.val('NINGUNO');
            selectTipoDisco.trigger('change');
            selectCapacidadDisco.val('NINGUNO');
            selectCapacidadDisco.trigger('change');
            selectProcesador.val('NINGUNO');
            selectProcesador.trigger('change');
            selectSistemaOperativo.val('NINGUNO');
            selectSistemaOperativo.trigger('change');
            inputMac.val('NINGUNO');
            inhabilitarControles(true);
        }
    }

    function inhabilitarControles(opcion) {
        selectRam.prop( "disabled", opcion );
        selectTipoDisco.prop( "disabled", opcion );
        selectCapacidadDisco.prop( "disabled", opcion );
        selectProcesador.prop( "disabled", opcion );
        selectSistemaOperativo.prop( "disabled", opcion );
        inputMac.prop( "disabled", opcion );
    }
</script>

@endsection