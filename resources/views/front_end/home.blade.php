@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')

    <!-- Safe Industery Start -->

    <div class="safe-industery-area section-padd-top30">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md pr-0">
                    <div class="safe-caption pt-10 mb-40">
                    <h2>{{trans('about.tieude')}}</h2>
                    <p class="safe-pera-one">{{trans('about.tieude2')}}</p>
                        <p class="safe-pera-two">{{trans('about.tieude3')}}</p>
                        <p class="safe-pera-three">{{trans('about.tieude4')}}</p>
                        <!-- btn -->
						@if (App::getLocale() == "vi")
                        <a href="product/frit-trong" class="btn">{{trans('about.dichvu')}}</a>
						@else
						 <a href="product/transparent-frit" class="btn">{{trans('about.dichvu')}}</a>
						@endif
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 pl-0">
                    <div class="safe-caption-right">
                        <div class="safe-img">
                            <img src="assets/img/safe_industery/safe_industery_1.jpg" alt="">
                        </div>
                        <!-- img TOP caption -->
                        <div class="safe-alert-box">
                            <div class="row">
                                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 d-none d-sm-block">

                                    <div class="safe-alert" data-background="assets/img/safe_industery/color_bg.png">
                                        <img src="assets/img/icon/aleart_icon.png" alt="">
                                        <h4>{{trans('about.nhiemvu')}}</h4>
                                        <p>{{trans('about.nhiemvu1')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->
    <div class="testimonial-area t-bg testimonial-padding">
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-11 col-lg-11 col-md-9">
                    <div class="h1-testimonial-active">
                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>{{trans('navbar.about')}}</p>
                                    <p>{{trans('about.vechungtoi')}}</p>
                                    <a href="/about" class="btn">{{trans('detail.readmore')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial text-center">
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <!-- <img src="assets/img/icon/testimonial.png" alt=""> -->
                                    <p>{{trans('header.company')}}</p>
                                    <p>{{trans('about.vechungtoi2')}}</p>
                                    <a href="/about" class="btn">{{trans('detail.readmore')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Team End -->
    <!-- David Droga start -->
    <div class="david-droga-area section-padding30">

        <div class="container">
            <div class="safe-industery-area section-padd">
                <div class="safe-caption pt-10 mb-40">
                    @if (App::getLocale() == "vi")
                        <h2>Tin tức mới nhất</h2>
                    @else
                        <h2>Latest news</h2>
                    @endif
                </div>
            </div>




            <style>

                #product-list {
                    display: flex;
                    padding: 2rem;
                    justify-content: center;
                }

                #product-list .product {
                    width: 45%;
                    float: left;
                    margin-left: 3.3%;
                    display: block;
                }

                #product-list .product:first-child {
                    margin-left: 0;
                }

                #product-list .product .img {
                    box-sizing: border-box;
                    height: 400px;
                    width: 300%;
                    overflow: hidden;
                }

                .title {
                    color: #4d4d4d;
                }

                .name {
                    color: #808080;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    align-self: flex-end;
                }

                img {
                    object-fit: cover;
                    display: block;
                    width: 100%;
                    max-width: none;
                    height: 100%;
                }

            </style>
            <section class="blog_area single-post-area section-padding">
                <div class="container-fluid">
                    <div id="product-list">
                        @foreach($new_trans as $new_tran)
                            <div class="product">
                                <div class="img"><a href="{{route('showNews.web',$new_tran->id)}}"><img
                                            src="{{$new_tran->image}}"/></a>
                                </div>
                                <h3 class="title"><a href="{{route('showNews.web',$new_tran->id)}}">{{$new_tran->name}}</a></h3>
                                <div class="name">{{$new_tran->description}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </section>
        </div>
    </div>
    <!-- David Droga End -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
		@if (session()->has('success'))
			toastr.success("{{ session()->get('success') }}")
		@endif
	</script>
@endsection
