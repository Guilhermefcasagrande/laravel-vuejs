@extends('layouts.app')

@section('content')

    <pagina tamanho="12">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

        <painel titulo="Lista de Artigos" cor="panel-primary">
            <tabela-lista 
                v-bind:titulos="['ID', 'Título', 'Descrição', 'Ações']"
                v-bind:itens="{{$listaArtigos}}"
                criar="#criar"
                detalhe="#criar"
                editar="#criar"
                deletar="#criar"
                token="234234234"
                ordem="desc"
                ordemcol="0"
                modal="sim">
            </tabela-lista>
        </painel>
    </pagina>

    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="form-adicionar" action="#" method="put" enctype="" token="@csrf">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="form-adicionar" type="submit" class="btn btn-info">Adicionar</button>
        </span>

    </modal>

    <modal nome="editar" titulo="Editar">
        <formulario id="form-editar" action="#" method="put" enctype="" token="@csrf">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="form-editar" type="submit" class="btn btn-info">Atualizar</button>
        </span>
    </modal>

    <modal nome="detalhe" titulo="Detalhes">
        <painel v-bind:titulo="$store.state.item.titulo">
        <p>@{{$store.state.item.descricao}}</p>
        </painel>
    </modal>
    

@endsection
