<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentsExport;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EquipmentController extends Controller
{
    public function index(){
        $equipments = Equipment::get();
        return view('equipments.index', compact('equipments'));
    }

    public function create(){
        return view('equipments.create');
    }

    public function store(StoreEquipmentRequest $resquest){
        $equipment = Equipment::create($resquest->validated());
        return redirect()->route('equipments.index');
    }
    
    public function edit($id){
        $equipment = Equipment::find($id);
        return view('equipments.edit', compact('equipment'));
    }

    public function update(UpdateEquipmentRequest $request){
        $equipment = Equipment::find($request->id);
        $equipment->sede = $request->sede;
        $equipment->area = $request->area;
        $equipment->piso = $request->piso;
        $equipment->codigo = $request->codigo;
        $equipment->tipo = $request->tipo;
        $equipment->marca = $request->marca;
        $equipment->modelo = $request->modelo;
        $equipment->numserie = $request->numserie;
        $equipment->mac = $request->mac;
        $equipment->procesador = $request->procesador;
        $equipment->ram = $request->ram;
        $equipment->capacidaddisco = $request->capacidaddisco;
        $equipment->sistemaoperativo = $request->sistemaoperativo;
        $equipment->adquisicion = $request->adquisicion;
        $equipment->stock = $request->stock;
        $equipment->observacion = $request->observacion;
        $equipment->users_id = $request->users_id;
        $equipment->save();

        return redirect()->route('equipments.index');
    }

    public function destroy($id){
        Equipment::destroy($id);
        return redirect()->route('equipments.index');
    }

    public function exporExcel(){
        $equipments = Equipment::get();
        return Excel::download(new EquipmentsExport($equipments), 'REPORTEB EQUIPOS.xlsx');
    }
}
