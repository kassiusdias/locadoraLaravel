<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\Filme;
Use App\Ator;

class GeneroController extends Controller
{
    public function listByGenres($id){
        $generoEscolhido = Genero::find($id);

        $generos = Genero::all();
        $filmes = Filme::where('id_genero', '=', $id)->paginate(5);

        return view('catalogoFilmes')->with(['generos' => $generos, 'generoEscolhido' => $generoEscolhido, 'filmes' => $filmes]);
    }

    Public Function create() {

        return view ('adicionandoGenero');
    }

    public function store(Request $request) {
        $request->validate([
            'descricao' => 'required'
        ]);

        
        $genero = Genero::create([
            'descricao' => $request->input('descricao'),
            
        ]);
        
        $genero->save();

        return redirect('/filmes');

    }
}
