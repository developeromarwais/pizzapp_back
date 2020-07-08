<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pizza;
use Illuminate\Support\Str;
class PizzaController extends Controller
{

    //Get all pizzas
    public function index()
    {
        return Pizza::all();
    }

    //Get one pizza
    public function show(Pizza $pizza)
    {
        return $pizza;
    }

    //Insert new pizza
    public function store(Request $request)
    { 
        $rndm = Str::random(60) . ".jpg";
        $request->file('img')->move(public_path("/img"), $rndm);
        $imgPath = url('/img/' . $rndm);

        $request["imageURL"] = $imgPath;
        $pizza = Pizza::create($request->all());
        return response()->json($pizza, 201);
    }


    //updae pizza
    public function update(Request $request, Pizza $pizza)
    {
        $pizza->update($request->all());

        return response()->json($pizza, 200);
    }


    //delete pizza
    public function delete(Pizza $pizza)
    {
        $pizza->delete();

        return response()->json(null, 204);
    }
}