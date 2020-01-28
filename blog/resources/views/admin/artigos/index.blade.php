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

    <modal nome="adicionar">
        <formulario action="#" method="put" enctype="" token="@csrf">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao">
            </div>

            <button type="submit" class="btn btn-info">Adicionar</button>
        </formulario>
    </modal>

    <modal nome="editar">
        <formulario action="#" method="put" enctype="" token="@csrf">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao">
            </div>

            <button type="submit" class="btn btn-info">Atualizar</button>
        </formulario>
    </modal>
    

@endsection
