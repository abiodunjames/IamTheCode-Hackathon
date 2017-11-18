<template>

    <div>
        <where-search></where-search>
        <direction></direction>
    </div>


</template>

<script>
    import WhereSearch from "./WhereSearch.vue";
    import Direction from "./GetDirection.vue";
    export  default {
        data(){
            return {}
        },
        components:{WhereSearch,Direction}
    }

</script>

<style>

</style>
