<template>
    <div>
        <div class="form-inline">
            <p>{{this.$store.state.itens}}</p>
            <modal-link nome="adicionar" v-if="criar && modal" titulo="Criar" classe="btn-primary"></modal-link>
            <a v-if="criar && !modal" v-bind:href="criar">Criar</a>

            <div class="form-group pull-right">
                <input type="search" class="form-control" v-model="buscar" placeholder="Buscar...">
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th v-on:click="ordenaColuna(index)" scope="col" class="ordena-tabela" v-for="(titulo, index) in titulos" v-bind:key="index">{{titulo}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista" v-bind:key="index">
                    <td v-for="(i, key) in item" v-bind:key="key">{{i}}</td>
                    <td>
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe" v-bind:href="detalhe" class="btn btn-primary"><i class="fas fa-search"></i> Detalhe</a>
                            <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-primary">Editar</a>
                            <modal-link nome="editar" v-if="editar && modal" titulo="Editar" classe="btn-primary"></modal-link>


                            <!-- O submit poderia ser feito com um button type=submit  -->
                            <a v-if="deletar" v-bind:href="deletar" v-on:click="submitForm(index)" class="btn btn-danger">Apagar</a>
                        </form>

                        <span v-if="!token || !deletar">
                            <a v-if="detalhe" v-bind:href="detalhe" class="btn btn-primary"><i class="fas fa-search"></i> Detalhe</a>
                            <a v-if="editar && !modal" v-bind:href="editar" class="btn btn-primary">Editar</a>
                            <modal-link nome="editar" v-if="editar && modal" titulo="Editar" classe="btn-primary"></modal-link>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos', 'itens', 'criar', 'detalhe', 'editar', 'deletar', 'token', 'ordem', 'ordemcol', 'modal'],
        data: function(){
            return {
                buscar:'',
                ordemAux: this.ordem || 'asc',
                ordemAuxCol: this.ordemcol || 1
            }
        },
        methods: {
            submitForm: function(index){
                document.getElementById(index).submit();
            },
            ordenaColuna: function(coluna){
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == 'asc'){
                    this.ordemAux = 'desc';
                } else {
                    this.ordemAux = 'asc';
                }
            }
        },
        computed:{
            lista: function(){

                this.$store.commit('setItens', {opa:"OK"});

                // Ordenação
                let ordem = this.ordemAux;
                let ordemCol = this.ordemAuxCol;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == 'asc'){
                    this.itens.sort(function(a,b){
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return 1;}
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return -1;}
                        return 0;
                    });
                } else {
                    this.itens.sort(function(a,b){
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return 1;}
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return -1;}
                        return 0;
                    });
                }

                // Busca
                if(this.buscar){
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

                return this.itens;
            }
        }
    }
</script>
<style>
    .ordena-tabela{
        cursor: pointer;
    }
</style>

