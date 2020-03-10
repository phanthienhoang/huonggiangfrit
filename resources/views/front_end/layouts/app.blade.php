<!doctype html>
<html class="no-js" lang="zxx">

    @include('front_end.partials.head')

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->


    @include('front_end.partials.header')

    @include('front_end.partials.slider')

    <main>

       @yield('content')

    </main>
   
    @include('front_end.partials.footer')
   
	@include('front_end.partials.js')
        
    </body>
</html>