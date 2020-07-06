<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    
    public function index()
    {
        return Order::all();
    }

    public function show(Order $order)
    {
        return $Order;
    } 
    public function store(Request $request)
    {
        $Order = Order::create($request->all());

        return response()->json($Order, 201);
    }

    public function update(Request $request, Order $Order)
    {
        $Order->update($request->all());

        return response()->json($Order, 200);
    }

    public function delete(Order $Order)
    {
        $Order->delete();
        return response()->json(null, 204);
    }
}
