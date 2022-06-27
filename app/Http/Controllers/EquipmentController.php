<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentsExport;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Area;
use App\Models\Campus;
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
        $campuses = Campus::get();
        return view('equipments.create', compact('campuses'));
    }

    public function store(StoreEquipmentRequest $request){
        $equipment = Equipment::create($request->validated());
        return redirect()->route('equipments.index');
    }
    
    public function edit($id){
        $equipment = Equipment::find($id);
        $campuses = Campus::get();
        return view('equipments.edit', compact('equipment', 'campuses'));
    }
    
    public function update(UpdateEquipmentRequest $request){
        $request->validate();
        $equipment = Equipment::find($request->id);
        $equipment->sede = $request->sede;
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
