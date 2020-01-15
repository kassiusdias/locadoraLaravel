@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Alteração de Ator</div>

                    <div class="card-body">
                    <form method="POST" action="/ator/modificar/{{ $atores->id }}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nome">Ator</label>
                                <input type="text" name="nome" class="form-control {{$errors->has('nome') ? ' is-invalid':''}}" id="nome" value="{{ $errors->has('nome') ? old('nome') : $atores->nome }}">
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
