<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailReceivedRequest;
use App\Models\DetailReceived;
use App\Models\Received;
use Illuminate\Http\Request;

class DetailReceivedController extends Controller
{
    public function create($id){
        $received = Received::find($id);
        return view('detail-receives.create', compact('received'));
    }

    public function store(StoreDetailReceivedRequest $request){
        $detailRecived = DetailReceived::create($request->validated());
        return back();
    }

    public function destroy($id){
        $detailRecived = DetailReceived::destroy($id);
        return back();
    }
}
