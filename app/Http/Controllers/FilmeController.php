<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;
use App\Genero;
use App\Ator;

class FilmeController extends Controller
{
    public function list(){
        $filmes = Filme::orderBy('id', 'DESC')->paginate(10);

        return view('listandoFilmes')->with('filmes', $filmes);
    }

    Public Function create() {

        $atores = Ator::all();
        $generos = Genero::all();
        return view ('adicionandoFilme')->with(['atores' => $atores, 'generos' => $generos]);
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required|max:60',
            'sinopse' => 'required|max:200',
            'genero' => 'required',
            'ator' => 'required'
        ]);

        

        $imagem = $request->file("imagem");
        if(empty($imagem)){
            $caminhoRelativo = null;
        } else {
            $imagem->storePublicly('uploads');
            $caminhoAbsoluto = public_path()."/storage/uploads";
            $nomeArquivo = $imagem->getClientOriginalName();
            $caminhoRelativo = "storage/uploads/$nomeArquivo";
            $imagem->move($caminhoAbsoluto, $nomeArquivo);
        }

        $filme = Filme::create([
            'titulo' => $request->input('titulo'),
            'sinopse' => $request->input('sinopse'),
            'imagem' => $caminhoRelativo,
            'id_genero' => $request->input('genero'),
            'id_protagonista' => $request->input('ator'),
        ]);
        
        $filme->save();

        return redirect('/filmes');

    }

    public function edit($id) {
        $atores = Ator::all();
        $generos = Genero::all();
        $filme = Filme::find($id);

        return view('editandoFilme')->with(['filme' => $filme, 'atores' => $atores, 'generos' => $generos]);

    }

    public function update(Request $request, $id){
        $filme = Filme::find($id);

        $request->validate([
            'titulo' => 'required|max:60',
            'sinopse' => 'required|max:200',
            'genero' => 'required',
            'ator' => 'required'
        ]);

        

        $imagem = $request->file("imagem");
        if(empty($imagem)){
            $caminhoRelativo = $filme->imagem;
        } else {
            $imagem->storePublicly('uploads');
            $caminhoAbsoluto = public_path()."/storage/uploads";
            $nomeArquivo = $imagem->getClientOriginalName();
            $caminhoRelativo = "storage/uploads/$nomeArquivo";
            $imagem->move($caminhoAbsoluto, $nomeArquivo);
        }

        $filme->titulo = $request->input('titulo');
        $filme->sinopse = $request->input('sinopse');
        $filme->imagem = $caminhoRelativo;
        $filme->id_protagonista = $request->input('ator');
        $filme->id_genero = $request->input('genero');

        $filme->save();

        return redirect('/filmes');
    }

    public function destroy($id) {
        $filme = Filme::find($id);

        $filme->delete();

        return redirect('/filmes');

    }

    
    public function index(){
        $filmes = Filme::orderBy('titulo', 'ASC')->paginate(5);
        $generos = Genero::all();

        return view('catalogoFilmes')->with(['filmes' => $filmes, 'generos' => $generos]);
    }

    public function search(Request $request){
        $generos = Genero::all();

        $search = $request->input('search');

        $filmes = Filme::
            where('titulo', 'like', '%'.$search.'%')
            ->orWhere('sinopse', 'like', '%'.$search.'%')
            ->paginate(5);

        return view('catalogoFilmes')->with(['filmes' => $filmes, 'search' => $search, 'generos' => $generos]);
    }


}
