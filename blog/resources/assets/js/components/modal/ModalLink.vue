<template>

    <div>
        <button type="button" v-bind:class="'btn '+ classe" data-toggle="modal" v-bind:data-target="'#'+ nome" style="margin-bottom: 20px;">
            {{titulo}}
        </button>    
    </div>
    
</template>

<script>
    export default {
        props: ['tipo', 'nome', 'titulo', 'classe']
    }
</script>