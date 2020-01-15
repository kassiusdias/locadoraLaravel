@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastro de Ator</div>

                    <div class="card-body">
                        <form method="POST" action="/cadastroa/adicionar" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome">Novo Ator</label>
                                <input type="text" name="nome" class="form-control {{$errors->has('nome') ? ' is-invalid':''}}" id="titulo" value="{{ old('nome') }}">
                                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                            </div>
                          
                            <div class="form-group col-md-2">
                                <button type="submit" class="form-control btn btn-primary">Enviar</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
