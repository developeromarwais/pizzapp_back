<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart_detail;
use Illuminate\Support\Str;

class Cart_detailController extends Controller
{
    public function index()
    {
        return Cart_detail::all();
    }

    public function show(Cart_detail $cart_detail)
    {
        return $cart_detail;
    }

    public function store(Request $request)
    {
        $cart_detail = Cart_detail::create($request->all());

        return response()->json($cart_detail, 201);
    }

    public function update(Request $request, Cart_detail $cart_detail)
    {
        $cart_detail->update($request->all());

        return response()->json($cart_detail, 200);
    }

    public function delete(Cart_detail $cart_detail)
    {
        $cart_detail->delete();

        return response()->json(null, 204);
    }
}
