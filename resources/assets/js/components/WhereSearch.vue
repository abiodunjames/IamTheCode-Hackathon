<template>
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline search_container">
                    <input type="text" class="form-control col-md-5 no-border-radius" value="" id="inlineFormInput" placeholder="Current Location">
                    <input type="text" class="form-control col-md-5 no-border-radius" id="inlineFormInputGroup" placeholder="Username">
                    <button type="submit" class="btn btn-primary no-border-radius">Show Me</button>
            </form>
        </div>
    </div>
</template>

<script>
    export  default{}

</script>

<style>
.no-border-radius  {
    border-radius:0px;
    -moz-border-radius: 0px;
    -webkit-border-radius: 0px;
}
    .search_container {
        border:1px rgba(0,0,0,0.1);
        padding: 20px 10px;
    }
    .form-control {
        border: 1px solid #0c5460;
        line-height: 1.35em;
    }
</style>
