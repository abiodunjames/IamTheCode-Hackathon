<template>
    <div>
        <navbar-component></navbar-component>
        <div class="wrapper">
            <div class="page-header page-header-small">
                <div class="page-header-image" data-parallax="true"
                     style="background-image: url('/assets/img/bg6.jpg');">
                </div>
                <div class="container">
                    <div class="content-center">
                        <h1 class="title">This is our great company.</h1>
                        <div class="text-center">
                            <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#pablo" class="btn btn-primary btn-icon btn-round">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-about-us">
                <div class="container">
                    <component v-bind:is="currentView"></component>
                </div>
            </div>


        </div>
    </div>

</template>

<script>
    import Home from "./Home.vue";
    import Place from "./places.vue";
    import  navbarComponent from "./navbarComponent.vue";
    import  bus from "./../eventBus/bus.vue"
    export default {
        name: "App",
        data(){
            return {
                currentView: "Home"
            }
        },
        components: {Home, Place,navbarComponent},
        created: function () {
            bus.$on('Page', ($event) => {
                this.currentView = $event;
            });
        },
        methods: {
        }
    }
</script>

<style>

</style>
