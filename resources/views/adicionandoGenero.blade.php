@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastros de Genero</div>

                    <div class="card-body">

                        <form method="POST" action="/cadastrog/adicionar" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('POST') }}
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="descricao">Novo Genero</label>
                                <input type="text" name="descricao" class="form-control {{$errors->has('descricao') ? ' is-invalid':''}}" id="descricao" value="{{ old('descricao') }}">
                                <div class="invalid-feedback">{{ $errors->first('descricao') }}</div>
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
