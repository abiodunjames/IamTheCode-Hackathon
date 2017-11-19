@extends('layout');

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
                <form action="/submit" method="post" onsubmit="getLocation()" enctype="multipart/form-data">
                  <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors:
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
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
                            <input type="file" class="form-control" placeholder="Upload file" name="image_file">
                        </div>
                        @if($errors->has('image_file'))
                            <span class="help-block">{{ $errors->first('image_file') }}</span>
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
                        <div class="textarea-container">
                            <textarea class="form-control" rows="2" cols="80" placeholder="Type a message..." name="description">{{old('description')}}</textarea>
                        </div>
                        <input type="hidden" name="lat" id="lat" value="0.0">
                        <input type="hidden" name="lng" id="lng" value="0.0">
                        <div class="send-button">
                            <input class="btn btn-primary btn-round btn-block btn-lg" type="submit" value="Upload">
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>

    <script>

          function getLocation() {
              if (navigator.geolocation) {
                  return navigator.geolocation.getCurrentPosition(showPosition);
              } else {
                console.log("Geolocation is not supported by this browser.");

                return true;
              }
          }

          function showPosition(position) {
              console.log("Latitude: " + position.coords.latitude +
              "Longitude: " + position.coords.longitude);

              document.getElementById("lat").id = position.coords.latitude;
              document.getElementById("lng").id = position.coords.longitude;

              return true;
          }
    </script>


@endsection
