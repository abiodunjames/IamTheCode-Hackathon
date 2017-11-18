<template>
    <div class="col-md-6">
            <div style="height:500px" id="mapContainer"></div>
    </div>

</template>

<script>
    export default  {
        data(){
            return {}
        },
        mounted: function () {
            this.startMap();
        },
        methods: {

            startMap(){
                var platform = new H.service.Platform({
                    'app_id': 'njPCpjldWLDokbhA74cX',
                    'app_code': 'RkttCWFr-QDBsBAcPDO9AQ'
                });
                // Instantiate (and display) a map object:
                var maptypes = platform.createDefaultLayers();
                var map = new H.Map(
                    document.getElementById('mapContainer'),
                    maptypes.normal.map,
                    {
                        zoom: 10,
                        center: {lng: 13.4, lat: 52.51}
                    });
            },
        }
    }


</script>

<style></style>
