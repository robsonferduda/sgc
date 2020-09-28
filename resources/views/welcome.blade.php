@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header"><strong>{{ __('Emissão de Certificados') }}</strong></div>
                <div class="card-body">
                    Emita certificados em formato pdf com chave única de autenticidade
                    <a href="{{ url('login') }}" class="btn btn-primary btn-round btn-block mb-3">
                        Emitir
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header"><strong>{{ __('Validação de Certificados') }}</strong></div>
                <div class="card-body">
                    Validação de certificados utilizando chave de identificação
                    <a href="{{ url('validar') }}" class="btn btn-success btn-round btn-block mb-3">
                        Validar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
