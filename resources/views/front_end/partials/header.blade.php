
<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top top-bg d-none d-lg-block">
               <div class="container">
                   <div class="col-xl-12">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="header-info-right">
                            <ul>     
                                <li>HUONG GIANG FRIT JOINT STOCK COMPANY</li>
                            </ul>
                        </div>
                        <div class="header-info-left">
                            <ul> 
                                <li>  
                                    <div style="margin:auto;" id="language_id">
                                        <a style='a:visited:color:red' href="{{ route('user.change-language',['en'])}}" ><img src='/assets/icon-en.png'/></a>
                                        <a style='a:visited:color:red' href="{{ route('user.change-language',['vi'])}}" ><img src='/assets/icon-vn.png'/></a>
                                    </div>
                                </li>    
                                <li>+84.2343.595.695</li>
                                <li>huonggiangfrit@gmail.com</li>
                            </ul>
                        </div>
                    
                   </div>
                   </div>
               </div>
            </div>
           <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="logo" style="">
                                <a href="/"><img width=100px src="assets/img/logo/huongiangicon.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-lg-block">

                                @include('front_end.partials.navbar')

                            </div>
                        </div>             
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>