<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::get();
        return view('orders.index', compact('orders'));
    }

    public function create(){
        return view('orders.create');
    }

    public function store(){}

    public function edit(){}

    public function update(){}

    public function exportExcel(){}

}
