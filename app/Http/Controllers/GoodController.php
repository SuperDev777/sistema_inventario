<?php

namespace App\Http\Controllers;

use App\Exports\GoodsExport;
use App\Http\Requests\StoreGoodRequest;
use App\Http\Requests\UpdateGoodRequest;
use App\Models\Good;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GoodController extends Controller
{

    public function index()
    {
        $goods = Good::get();
        return view('goods.index', compact('goods'));
    }

    public function create()
    {
        return view('goods.create');
    }

    public function store(StoreGoodRequest $request)
    {
        $good = Good::create($request->validated());
        return redirect()->route('goods.index');
    }

    public function edit($id){
        $good = Good::find($id);
        return view('goods.edit', compact('good'));
    }

    public function update(UpdateGoodRequest $request){
        $good = Good::find($request->id);
        $good->codigo = $request->codigo;
        $good->tipo = $request->tipo;
        $good->marca = $request->marca;
        $good->descripcion = $request->descripcion;
        $good->stock = $request->stock;
        //$good->users_id = $request->users_id;

        $good->save();

        return redirect()->route('goods.index');
    }

    public function exporExcel(){
        $goods = Good::get();
        return Excel::download(new GoodsExport($goods), 'REPORTEB BIENES.xlsx');
    }

}
