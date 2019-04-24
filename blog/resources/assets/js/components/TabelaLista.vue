<template>
    <div>
        <a v-if="criar" v-bind:href="criar" class="btn btn-primary">Criar</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" v-for="titulo in titulos">{{titulo}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in itens">
                    <td v-for="i in item">{{i}}</td>
                    <td>
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe" v-bind:href="detalhe" class="btn btn-primary"><i class="fas fa-search"></i> Detalhe</a>
                            <a v-if="editar" v-bind:href="editar" class="btn btn-primary">Editar</a>

                            <!-- O submit poderia ser feito com um button type=submit  -->
                            <a v-if="deletar" v-bind:href="deletar" v-on:click="submitForm(index)" class="btn btn-danger">Apagar</a>
                        </form>

                        <span v-if="!token || !deletar">
                            <a v-if="detalhe" v-bind:href="detalhe" class="btn btn-primary"><i class="fas fa-search"></i> Detalhe</a>
                            <a v-if="editar" v-bind:href="editar" class="btn btn-primary">Editar</a>
                        </span>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token'],
        methods: {
            submitForm: function(index){
                document.getElementById(index).submit();
            }
        }
    }
</script>
