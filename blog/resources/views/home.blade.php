@extends('layouts.app')

@section('content')

    <pagina tamanho="9">
        <painel titulo="Painel da Home" cor="panel-success">
            Teste de conteúdo do painel

            <div class="row">
                <div class="col-md-4">
                    <caixa qtd="230" titulo="Clientes ativos" url="#" cor="orange" icone="fa fa-shopping-cart"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa qtd="100" titulo="Sites online" url="#" cor="green" icone="fas fa-globe-americas"></caixa>
                </div>
                <div class="col-md-4">
                    <caixa qtd="10" titulo="Novos clientes" url="#" cor="blue" icone="fas fa-plus"></caixa>
                </div>
            </div>

        </painel>

    </pagina>

@endsection
