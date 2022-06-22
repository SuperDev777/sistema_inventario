<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailOrderRequest;
use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class DetailOrderController extends Controller
{
    public function create($id){
        $order = Order::find($id);
        return view('detail-orders.create', compact('order'));
    }

    public function store(StoreDetailOrderRequest $request){
        $detailOrder = DetailOrder::create($request->validated());
        return back();
    }

    public function destroy($id){
        $detailOrder = DetailOrder::destroy($id);
        return back();
    }
}
