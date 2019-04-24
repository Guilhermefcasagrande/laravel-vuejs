@extends('layouts.app')

@section('content')

    <pagina tamanho="12">
        <painel titulo="Lista de Artigos" cor="panel-primary">
            <tabela-lista 
                v-bind:titulos="['ID', 'Título', 'Descrição', 'Ações']"
                v-bind:itens="[
                    ['1', 'Titulo artigo 1','Curso de PHP'],
                    ['2', 'Titulo artigo 2','Curso de Java'],
                    ['3', 'Titulo artigo 3','Curso de VueJS']
                ]"
                criar="#criar"
                detalhe="#criar"
                editar="#criar"
                deletar="#criar"
                token="234234234"
                ordem="desc"
                ordemcol="0">
            </tabela-lista>
        </painel>
    </pagina>

@endsection
