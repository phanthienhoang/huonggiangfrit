<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">

    <!-- CSS here -->
        {{-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href=" {{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href=" {{ asset('assets/css/gijgo.css') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="/assets/css/slicknav.css">
        <link rel="stylesheet" href="/assets/css/animate.min.css">
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="/assets/css/themify-icons.css">
        <link rel="stylesheet" href="/assets/css/slick.css">
        <link rel="stylesheet" href="/assets/css/nice-select.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/responsive.css">
        {!! NoCaptcha::renderJs() !!}
        @yield('style')
</head>
