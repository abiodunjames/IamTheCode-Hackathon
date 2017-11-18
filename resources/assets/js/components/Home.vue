<template>
    <div>
    <div class="row">
        <div class="col-md-12">
            <search></search>
        </div>
    </div>
    <div class="row col-md-12">
        <main-component>
        </main-component>
        <street></street>
    </div>
    </div>
</template>


<script>
    import Search from "./Search.vue";
    import Sidebar from "./Sidebar.vue";
    import MainComponent from "./MainComponent.vue";
    import  Street from "./Street.vue";
    import Place from "./places.vue";
    export default{
        data(){
            return {
            }
        },
        components:{Search, Sidebar, MainComponent, Street,Place}
    }
</script>
