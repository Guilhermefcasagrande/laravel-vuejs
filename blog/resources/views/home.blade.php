@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <painel titulo="Painel da Home" cor="panel-success">
                    Teste de conteúdo do painel

                    <div class="row">

                        <div class="col-md-4">
                            <caixa></caixa>
                        </div>
                        <div class="col-md-4">
                            <painel titulo="Painel 2">
                                Teste de componente dentro de componente
                            </painel>
                        </div>
                        <div class="col-md-4">
                            <painel titulo="Painel 3" cor="blue">
                                Teste de componente dentro de componente
                            </painel>
                        </div>

                    </div>

                </painel>
            </div>
        </div>
    </div>

@endsection
