<template>
    <div>
        <navbar-component></navbar-component>
        <div class="wrapper">
            <div class="page-header page-header-small">
                <div class="page-header-image" data-parallax="true"
                     style="background-image: url('/images/login.jpg');">
                </div>
                <div class="container">
                    <div class="content-center">
                        <h1 class="title">
                            On a special mission to eradicate human trafficking
                        </h1>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 justify-content-center">
                            <div class="card-deck">
                                <div class="col-md-3 card">
                                    <div class="card-body">
                                        <h1 class="m-0 p-0 text-success">25</h1>
                                        <h3>Traffickers Reported</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 card">
                                    <div class="card-body">
                                        <h1 class="m-0 p-0 text-warning">10</h1>
                                        <h3>Traffickers Confirmed</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 card ">
                                    <div class="card-body">
                                        <h1 class="m-0 p-0 text-info" >5</h1>
                                        <h3>Traffickers Prosecuted</h3>
                                    </div>
                                </div>
                                <div class="col-md-3 card">
                                    <div class="card-body">
                                        <h1 class="m-0 p-0">5</h1>
                                        <h3>Traffickers on the Run</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <report></report>

                        </div>
                        <div class="col-md-6">
                            <direction></direction>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import Home from "./Home.vue";
    import Place from "./places.vue";
    import  navbarComponent from "./navbarComponent.vue";
    import  bus from "./../eventBus/bus.vue";
    import Report from "./Report.vue";
    import Direction from "./GetDirection.vue";
    export default {
        name: "App",
        data(){
            return {
                currentView: "Report"
            }
        },
        components: {Home, Place, navbarComponent, Report, Direction},
        created: function () {
            bus.$on('Page', ($event) => {
                this.currentView = $event;
            });
        },
        methods: {}
    }
</script>

<style>

</style>
