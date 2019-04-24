<template>
    <div>
        <div class="form-inline">
            <a v-if="criar" v-bind:href="criar" class="btn btn-primary">Criar</a>
            <div class="form-group pull-right">
                <input type="search" class="form-control" v-model="buscar" placeholder="Buscar...">
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" v-for="titulo in titulos">{{titulo}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
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
        data: function(){
            return {
                buscar:''
            }
        },
        methods: {
            submitForm: function(index){
                document.getElementById(index).submit();
            }
        },
        computed:{
            lista: function(){

                this.itens.sort(function(a,b){
                    if (a[0] > b[0]) { return 1;}
                    if (a[0] < b[0]) { return -1;}
                    return 0;
                });

                let busca = this.buscar;
                return this.itens.filter(resposta => {
                    for (let k = 0; k < resposta.length; k++) {
                        if(resposta[k].toString().toLowerCase().indexOf(busca.toLowerCase()) >= 0){
                            return true;
                        }
                    }
                    return false;
                    
                });
            }
        }
    }
</script>
