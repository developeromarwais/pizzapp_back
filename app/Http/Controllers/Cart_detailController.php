<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart_detail;
use Illuminate\Support\Str;

class Cart_detailController extends Controller
{

    //Show all carts details
    public function index()
    {
        return Cart_detail::all();
    }


    //show one cart detail
    public function show(Cart_detail $cart_detail)
    {
        return $cart_detail;
    }


    //insert new cart detail
    public function store(Request $request)
    {
        $cart_detail = Cart_detail::create($request->all());

        return response()->json($cart_detail, 201);
    }


    //update cart detail
    public function update(Request $request, Cart_detail $cart_detail)
    {
        $cart_detail->update($request->all());

        return response()->json($cart_detail, 200);
    }

    //delete cart detail
    public function delete(Cart_detail $cart_detail)
    {
        $cart_detail->delete();

        return response()->json(null, 204);
    }
}
