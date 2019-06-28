<?php
namespace App\Http\Controllers;
use App\Http\Resources\pokemon as pokemonResource;
use App\Http\Resources\pokemonCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\pokemon;

class PokemonController extends Controller
{
    public function index(){
        pokemonCollection::withoutWrapping();
        return new pokemonCollection(pokemon::paginate());    
    }

    public function show(pokemon $pokemon){
        pokemonResource::withoutWrapping();
        return new pokemonResource($pokemon->load(['types','abilities','egg_groups']));
    }

    public function catch(pokemon $pokemon){
        $user = Auth::user(); 
        $user->pokemon()->sync($pokemon, false); 
    }

    public function my(){
        $pokemon = Auth::user()->pokemon()->orderBy('id')->get();
        return new pokemonCollection($pokemon->load(['types','abilities','egg_groups']));
    }
}
