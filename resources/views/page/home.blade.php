@extends('layout')

@section('content')

<div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/trafficked.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <h1 class="title">Report any case of Human Trafficking</h1>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-icon btn-round">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section-contact-us text-center">
            <div class="container">
                <h2 class="title">Upload pictures of suspects</h2>
                <p class="description">Your information will be kept confidential.</p>
                <form action="/api/upload/image" method="post" enctype="multipart/form-data" id="uploadForm">
                  <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                    @if (Session::has('msg'))
                        <div class="alert alert-success" role="alert">
                          Your upload has been successfully sent.
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif
                  </div>
                    <div class="clear-fix" />
                    {!! csrf_field() !!}
                    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                        <div class="input-group input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input type="file" class="form-control" placeholder="Upload file" name="image" id="image_file">
                        </div>
                        <img id="image" />
                        <br/><br/>
                        @if($errors->has('image'))
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        @endif
                        <div class="input-group input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_email-85"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Email..." name="email" value="{{old('email')}}">
                            @if($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <!--div class="textarea-container">
                            <textarea class="form-control" rows="2" cols="80" placeholder="Type a message..." name="description">{{old('description')}}</textarea>
                        </div-->
                        <input type="hidden" name="lat" id="lat" value="0.0">
                        <input type="hidden" name="lng" id="lng" value="0.0">
                        <div class="send-button">
                            <input class="btn btn-primary btn-round btn-block btn-lg" type="submit" value="Upload" id="uploadButton">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

      $(document).ready(function() {
          $("#uploadButton").click(function(event){
            event.preventDefault();

            getLocation();
          });
      });

      function getLocation() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(showPosition);
          } else {
            console.log("Geolocation is not supported by this browser.");

            $("#uploadForm").submit();
            return true;
          }
      }

      function showPosition(position) {
          console.log("Latitude: " + position.coords.latitude +
          "Longitude: " + position.coords.longitude);

          document.getElementById("lat").value = position.coords.latitude;
          document.getElementById("lng").value = position.coords.longitude;

          $("#uploadForm").submit();
          return true;
      }

      document.getElementById("image_file").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            var img = document.getElementById("image");
            img.src = e.target.result;

            var width = img.clientWidth;
            var height = img.clientHeight;

            var newWidth = "";
            var newHeight = "";
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };

@endsection
