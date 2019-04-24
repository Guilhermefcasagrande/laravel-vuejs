@extends('layouts.app')

@section('content')

    <pagina tamanho="12">
        <painel titulo="Lista de Artigos" cor="panel-primary">
            <a href="#" class="btn btn-primary">Criar</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Resumo</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Artigo teste</td>
                        <td>Descrição</td>
                        <td>Guilherme</td>
                        <td>24/04/2019</td>
                        <td>
                            <a href="#" class="btn btn-primary">Editar</a>
                            <a href="#" class="btn btn-danger">Apagar</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </painel>

    </pagina>

@endsection
