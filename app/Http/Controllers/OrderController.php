<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Area;
use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::get();
        return view('orders.index', compact('orders'));
    }

    public function create(){
        $areas = Area::get();
        return view('orders.create', compact('areas'));
    }

    public function store(StoreOrderRequest $request){
        $order = Order::create($request->validated());
        return redirect()->route('detailOrders.create', $order->id);
    }

    public function show($id){
        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id){
        $order = Order::find($id);
        $areas = Area::get();
        return view('orders.edit', compact('order', 'areas'));
    }

    public function update(UpdateOrderRequest $request){
        $request->validated();
        $order = Order::find($request->order_id);
        $order->area_id = $request->area_id;
        $order->user_id = $request->user_id;
        $order->jefeinmediato = $request->jefeinmediato;
        $order->save();
        return back();
    }

    public function destroy($id){
        $order = Order::find($id);
        foreach($order->detailOrders as $detail){
            DetailOrder::destroy($detail->id);
        }
        Order::destroy($order->id);
        return redirect()->route('orders.index');
    }

    public function exporExcel(){
        $orders = Order::get();
        return Excel::download(new OrdersExport($orders), 'REPORTE ORDENES.xlsx');
    }

}
