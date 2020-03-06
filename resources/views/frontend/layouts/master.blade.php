<!DOCTYPE html>
<html lang="en">

<head>
  <title>Success &mdash;</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="frontend/fonts/icomoon/style.css">
  <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
  <link rel="stylesheet" href="frontend/css/jquery-ui.css">
  <link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
  <link rel="stylesheet" href="frontend/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="frontend/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="frontend/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="frontend/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="frontend/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="frontend/css/aos.css">
  <link href="frontend/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="frontend/css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div class="site-wrap">
    @include('frontend.layouts.header.index')


    @yield('content')


    @include('frontend.layouts.footer.index')
  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
      stroke="#ff5e15" /></svg>
  </div>

  <script src="frontend/js/jquery-3.3.1.min.js"></script>
  <script src="frontend/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="frontend/js/jquery-ui.js"></script>
  <script src="frontend/js/popper.min.js"></script>
  <script src="frontend/js/bootstrap.min.js"></script>
  <script src="frontend/js/owl.carousel.min.js"></script>
  <script src="frontend/js/jquery.stellar.min.js"></script>
  <script src="frontend/js/jquery.countdown.min.js"></script>
  <script src="frontend/js/bootstrap-datepicker.min.js"></script>
  <script src="frontend/js/jquery.easing.1.3.js"></script>
  <script src="frontend/js/aos.js"></script>
  <script src="frontend/js/jquery.fancybox.min.js"></script>
  <script src="frontend/js/jquery.sticky.js"></script>
  <script src="frontend/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="frontend/js/main.js"></script>
</body>
</html>