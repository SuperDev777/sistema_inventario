<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Equipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //$inventario = Equipment::join('areas', 'equipments.area_id', '=', 'areas.id')->join('campus', 'equipments.campus_id', '=', 'campus.id')->selectRaw('count(areas.id) as equipos, campus.nombre as sede, areas.nombre as area')->groupBy('campus.id', 'areas.id')->get();
        $sedes = Equipment::join('campus', 'equipments.campus_id', '=', 'campus.id')->select('campus.nombre')->groupBy('campus.id')->get();
        $inventario = Equipment::join('campus', 'equipments.campus_id', '=', 'campus.id')->selectRaw('count(campus.id) as equipos, campus.nombre as sede')->groupBy('campus.id')->get();
        
        return view('home', compact('inventario'));
    }
}
