<?php
namespace App\Http\Controllers;
use App\Http\Resources\pokemon as pokemonResource;
use App\Http\Resources\pokemonCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pokemon;

class PokemonController extends Controller
{
    public function index(){
        return new pokemonCollection(Pokemon::paginate());
    }

    public function show(Pokemon $pokemon){
        return new pokemonResource($pokemon->load(['types','abilities','egg_groups']));
    }

    public function catch(Pokemon $pokemon){
        $user = Auth::user(); 
        $user->pokemon()->sync($pokemon, false); 
    }

    public function my(){
        $pokemon = Auth::user()->pokemon()->orderBy('id')->get();
        return new pokemonCollection($pokemon->load(['types','abilities','egg_groups']));
    }
}
