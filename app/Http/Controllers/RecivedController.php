<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceivedRequest;
use App\Http\Requests\UpdateReceivedRequest;
use App\Models\Area;
use App\Models\DetailReceived;
use App\Models\Received;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RecivedController extends Controller
{
    public function index(){
        $receives = Received::get();
        return view('receives.index', compact('receives'));
    }

    public function create(){
        $areas = Area::get();
        return view('receives.create', compact('areas'));
    }

    public function store(StoreReceivedRequest $request){
        $received = Received::create($request->validated());
        return redirect()->route('detailReceives.create', $received->id);
    }

    public function show($id){
        $received = Received::find($id);
        return view('receives.show', compact('received'));
    }

    public function edit($id){
        $received = Received::find($id);
        $areas = Area::get();
        return view('receives.edit', compact('received', 'areas'));
    }

    public function update(UpdateReceivedRequest $request){
        $request->validated();
        $received = Received::find($request->received_id);
        $received->area_id = $request->area_id;
        $received->user_id = $request->user_id;
        $received->jefeinmediato = $request->jefeinmediato;
        $received->save();
        return back();
    }

    public function destroy($id){
        $received = Received::find($id);
        foreach($received->detailReceived as $detail){
            DetailReceived::destroy($detail->id);
        }
        Received::destroy($received->id);
        return redirect()->route('receives.index');
    }
}
