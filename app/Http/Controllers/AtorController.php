<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
Use App\Filme;
Use App\Ator;

class AtorController extends Controller
{
    public function list(){
        $atores = Ator::all();
        $atores = Ator::orderBy('id', 'DESC')->paginate(15);

        return view('listandoAtor')->with('atores', $atores);
    }
    
    Public Function create() {

        $atores = Ator::all();
        
        return view ('adicionandoAtor')->with('atores', $atores);
        
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required'
        ]);

        
        $ator = Ator::create([
            'nome' => $request->input('nome'),
            
        ]);
        
        $ator->save();

        return redirect('/filmes');

    }

    public function edit($id) {
        $atores = Ator::find($id);
        

        return view('editandoAtor')->with('atores', $atores);
    }

    public function update(Request $request, $id){
        $atores = Ator::find($id);

        $request->validate([
            'nome' => 'required',
            
        ]);

        $atores->nome = $request->input('nome');

        $atores->save();

        return redirect('/ator');
    }

    public function destroy($id) {
        $ator = Ator::find($id);

        $ator->delete();

        return redirect('/ator');

    }

}
