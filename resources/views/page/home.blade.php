@extends('layout');

@section('content')

<div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/trafficked.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <h1 class="title">Report any case of Human Trafficking.</h1>
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

        <div class="section section-contact-us text-center">
            <div class="container">
                <h2 class="title">Upload pictures of suspects</h2>
                <p class="description">Your information will be kept confidential.</p>
                <form>
                  <div class="row">

                    <div class="col-lg-6 text-center col-md-8 ml-auto mr-auto">
                        <div class="input-group input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons users_circle-08"></i>
                            </span>
                            <input type="file" class="form-control" placeholder="Upload file">
                        </div>
                        <div class="input-group input-lg">
                            <span class="input-group-addon">
                                <i class="now-ui-icons ui-1_email-85"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Email...">
                        </div>
                        <div class="textarea-container">
                            <textarea class="form-control" name="name" rows="4" cols="80" placeholder="Type a message..."></textarea>
                        </div>
                        <div class="send-button">
                            <a href="#pablo" class="btn btn-primary btn-round btn-block btn-lg">Upload</a>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>


@endsection
