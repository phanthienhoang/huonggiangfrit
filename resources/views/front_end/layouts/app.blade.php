<!doctype html>
<html class="no-js" lang="zxx">

    @include('front_end.partials.head')

   <body>

    @include('front_end.partials.header')

    @include('front_end.partials.slider')

    <main>

       @yield('content')

    </main>

    @include('front_end.partials.footer')

	@include('front_end.partials.js')

    </body>
</html>
