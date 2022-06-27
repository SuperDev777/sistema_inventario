<?php

namespace App\Http\Controllers;

use App\Exports\CampusExport;
use App\Http\Requests\StoreCampusRequest;
use App\Models\Campus;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CampusController extends Controller
{
    // Muestra la lista de usuarios
    public function index()
    {
        $campuses = Campus::get();
        return view('campus.index', compact('campuses'));
    }

    // Muestra el formulario de registro de usuario
    public function create()
    {
        return view('campus.create');
    }

    // Registra un usuario en la base de datos
    public function store(StoreCampusRequest $request)
    {
        $campus = Campus::create($request->validated());
        return redirect()->route('campus.index');
    }

    // Muestra el formulario de actualización de usuario
    public function edit($id)
    {
        $campus = Campus::find($id);
        return view('campus.edit', compact('campus'));
    }

    public function update(Request $request)
    {
        $campus = Campus::find($request->id);
        $campus->nombre = $request->nombre;
        $campus->save();
        return redirect()->route('campus.index');
    }

    public function destroy($id){
        $campus = Campus::destroy($id);
        return redirect()->route('campus.index');
    }

    public function exporExcel(){
        $campuses = Campus::get();
        return Excel::download(new CampusExport($campuses), 'REPORTEB SEDES.xlsx');
    }
}
