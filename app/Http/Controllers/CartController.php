<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        return Cart::all();
    }

    public function show(Cart $cart)
    {
        return $cart;
    }

    public function getCartDetails(Cart $cart)
    {
        $cart_details = DB::table('cart_details')->where([
            ['cartId', '=', $cart->id],
            ['carts.status', '=', 'Open'], 
        ])
        ->join('pizzas', 'cart_details.pizzaId', '=', 'pizzas.id')
        ->join('carts', 'cart_details.cartId', '=', 'carts.id')
        ->select('cart_details.*', 'pizzas.*', 'cart_details.id', 'cart_details.created_at')
        ->get();
        return $cart_details;
    }

    

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());

        return response()->json($cart, 201);
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update($request->all());

        return response()->json($cart, 200);
    }

    public function delete(Cart $cart)
    {
        $cart->delete();
        return response()->json(null, 204);
    }
}
