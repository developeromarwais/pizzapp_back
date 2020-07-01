<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pizza;
use Illuminate\Support\Str;
class PizzaController extends Controller
{
    public function index()
    {
        return Pizza::all();
    }

    public function show(Pizza $pizza)
    {
        return $pizza;
    }

    //TEST CI/CD
    public function store(Request $request)
    {
        //pizza = Pizza::create($request->all());

        $rndm = Str::random(60) . ".jpg";
        $request->file('img')->move(public_path("/img"), $rndm);
        $imgPath = url('/img/' . $rndm);

        $request["imageURL"] = $imgPath;
        $pizza = Pizza::create($request->all());
        return response()->json($pizza, 201);
    }

    public function update(Request $request, Pizza $pizza)
    {
        $pizza->update($request->all());

        return response()->json($pizza, 200);
    }

    public function delete(Pizza $pizza)
    {
        $pizza->delete();

        return response()->json(null, 204);
    }
}