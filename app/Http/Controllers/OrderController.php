<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
use App\Order;

class OrderController extends Controller
{
     

    public function getUserOrders()
    {
        $orders = DB::table('orders')->where([
            ['carts.userId', '=', Auth::user()->id],
        ])
        ->join('carts', 'orders.cartId', '=', 'carts.id')
        ->select('orders.*')
        ->get();
        return $orders;
    } 
  

    public function getOrderDetails(Order $order)
    {
        $cart_details = DB::table('cart_details')->where([
            ['carts.userId', '=', Auth::user()->id],
            ['carts.id', '=', $order->cartId],
            ['carts.status', '=', 'Closed'],
        ])
        ->join('carts', 'cart_details.cartId', '=', 'carts.id')
        ->join('pizzas', 'cart_details.pizzaId', '=', 'pizzas.id')
        ->select('cart_details.*', 'pizzas.*', 'cart_details.id', 'cart_details.created_at')
        ->get();
        return $cart_details;
    } 
  

    public function store(Request $request)
    {
        $Order = Order::create($request->all());

        return response()->json($Order, 201);
    } 
}
