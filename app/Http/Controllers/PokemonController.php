<?php

namespace LaraDex\Http\Controllers;
use LaraDex\Pokemon;
use LaraDex\Trainer;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    protected $trainer;

    public function __construct(Trainer $trainer) {
        $this->trainer = $trainer;
    }
    public function index(Request $request) {
        if($request->ajax()) {
            $pokemons = Pokemon::all();
            return response()->json($pokemons, 200);
        }
        return view('pokemons.index');
    }
    public function store(id $id, Request $request) {
        
        if($request->ajax()) {
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');
            $pokemon->id()->associate($id)->save(); 
            //$pokemon->save(); 

            return response()->json([
                //"trainer" => $trainer,
                "message" => "Pokemon creado correctamente.",
                "pokemon" => $pokemon
            ], 200);
        }
    }
}
