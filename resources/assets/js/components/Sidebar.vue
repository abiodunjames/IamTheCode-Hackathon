<template>
    <div class="col-md-6">
        <div class="card-no-border">
            <ul class="nav nav-tabs justify-content-center" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#map" role="tab" aria-expanded="true">
                        Map
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#places" role="tab" aria-expanded="false">
                        Places
                    </a>
                </li>
            </ul>
            <div class="card-body">
                <!-- Tab panes -->
                <div class="tab-content text-center">
                    <div class="tab-pane" id="map" role="tabpanel" aria-expanded="false">
                        <street></street>
                    </div>
                    <div class="tab-pane active" id="places" role="tabpanel" aria-expanded="true">
                             <places></places>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>
<script>
    import Street from "./Street.vue";
    import Places from "./places.vue";

    export  default{
        data(){
            return {}
        },
        components:{Street,Places}

    }
</script>
