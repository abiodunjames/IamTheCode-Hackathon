<template>
    <div class="row">
        <div class="card">
            <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist"
                data-background-color="black">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" role="tab" @click="getData()">
                        <i class="now-ui-icons objects_umbrella-13"></i> Refresh
                    </a>
                </li>

            </ul>

            <div class="card-block">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Location</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Created At</th>
                        <th>Direction</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(row,index) in incidents" v-bind:class="{'active-row': (row.id == selected)}">
                        <td>{{index+1}}</td>
                        <td>{{row.name}}</td>
                        <th>
                            <span v-if="row.photo!=''">
                            <img :src="row.photo" width="50" height="50"/>
                            </span>
                            <span v-if="row.photo==''">
                                <img src="https://picsum.photos/100/100" width="50" height="50"/>
                            </span>
                        </th>
                        <td>{{row.location}}</td>
                        <td>{{row.latitude}}</td>
                        <td>{{row.longitude}}</td>
                        <td>{{row.created_at}}</td>
                        <td><a class="btn btn-success text-white" @click="show(row.latitude,row.longitude,row.id)">Show
                            Direction</a></td>
                    </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import bus from "./../eventBus/bus.vue"

    export default {
        data(){
            return {
                incidents: [],
                selected: null,
            }
        },
        created: function () {

            this.getData();
        },
        methods: {
            getData(){
                axios.get('/api/incidents').then((response) => {
                    var response = response.data;
                    console.log(response);
                    if (response.status == true) {
                        this.incidents = response.data;
                    }
                    if (response.status == false) {
                    }
                });
            },
            show (lat, lng, id) {
                var value = lat + "," + lng;
                bus.$emit('raiseModal', value);
                this.selected = id;

            },

        }

    }

</script>


<style scoped>
    .active-row {
        background-color: lightgray;

    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #e9ecef;
        font-size: 12px;
    }

    .table td, .table th {
        padding: 0.2rem;
        vertical-align: top;
        border-top: 1px solid #e9ecef;
    }

</style>
