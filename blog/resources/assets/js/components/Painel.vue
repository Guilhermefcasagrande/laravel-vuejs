<template>
    <div v-bind:class="defineCor">
        <div class="panel-heading">{{ titulo }}</div>

        <div class="panel-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
            defineCor: function(){
                return "panel "+ (this.cor || "panel-primary");
            }
        }
    }
</script>

<style>
    .blue{
        border-color: #081b89;
    }
    .blue > .panel-heading {
        color: #fff;
        background-color: #081b89;
        border-color: #081b89;
    }
</style>

