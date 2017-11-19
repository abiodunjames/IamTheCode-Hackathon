<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Human Trafficking Whistleblower</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>
    <!-- CSS Files -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/now-ui-kit.css?v=1.1.0')}}" rel="stylesheet"/>

    <script src="{{asset('js/map.core.js')}}"></script>
    <script src="{{asset('js/map.service.js')}}"></script>
    @yield('styles')
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet"/>
</head>

<body class="landing-page sidebar-collapse">

  <!-- Navbar -->
      <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
          <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://iamthecode.org" rel="tooltip" title="iamtheCODE" data-placement="bottom" target="_blank">
                    <img src="../assets/img/iamtheCODE-logo.png" alt="iamtheCODE" width="200" height="50">
                </a>
            </div>
              <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="#">About</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#">Help?</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/CreativeTim" target="_blank">
                              <i class="fa fa-twitter"></i>
                              <p class="d-lg-none d-xl-none">Twitter</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com/CreativeTim" target="_blank">
                              <i class="fa fa-facebook-square"></i>
                              <p class="d-lg-none d-xl-none">Facebook</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
                              <i class="fa fa-instagram"></i>
                              <p class="d-lg-none d-xl-none">Instagram</p>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>
      <!-- End Navbar -->
    @yield('content')

<footer class="footer footer-default">
    <div class="container">
        <nav>
            <ul>

            </ul>
        </nav>
        <div class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>
        </div>
    </div>
</footer>
</body>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{asset('assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/now-ui-kit.js?v=1.1.0')}}" type="text/javascript"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    @yield('scripts')



</script>

</html>
