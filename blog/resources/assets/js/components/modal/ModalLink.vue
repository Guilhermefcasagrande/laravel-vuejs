<template>

    <span>
        <span v-if="item">
            <button type="button" v-on:click="preencheFormulario()" v-bind:class="'btn '+ classe" data-toggle="modal" v-bind:data-target="'#'+ nome" style="margin-bottom: 20px;">
                {{titulo}}
            </button>
        </span>

        <span v-if="!item">    
            <button type="button" v-on:click="preencheFormulario()" v-bind:class="'btn '+ classe" data-toggle="modal" v-bind:data-target="'#'+ nome" style="margin-bottom: 20px;">
                {{titulo}}
            </button>
        </span>
    </span>
    
</template>

<script>
    export default {
        props: ['tipo', 'nome', 'titulo', 'classe', 'item', 'url'],
        methods:{
            preencheFormulario:function(){
                axios.get(this.url + this.item.id)
                    .then(res => {
                        // console.log(res.data);
                        this.$store.commit('setItem', res.data);
                    });
                // this.$store.commit('setItem', this.item);
            }
        }
    }
</script>