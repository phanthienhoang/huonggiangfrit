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
            <div class="row ">
                @foreach($new_trans as $new_tran)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <!-- single-david -->
                        <div class="single-david mb-30">
                            <div class="david-img">
                                <img src="{{$new_tran->image}}" alt="">
                            </div>
                            <div class="david-captoin">
                                <ul class="david-info">
                                    <li>{{$new_tran->created_at}} </li>
                                    <li></li>
                                </ul>
                                <h2 ><a class="text-truncate"
                                                                 href="{{route('category.web.new.show',$new_tran->id)}}">{{$new_tran->name}}</a>
                                </h2>
                                @if (App::getLocale() == "vi")
                                    <a
                                        href="{{route('category.web.new.show',$new_tran->id)}}"> {{trans('detail.readmore')}}</a>
                                @else
                                    <a
                                        href="{{route('category.web.new.show',$new_tran->id)}}">{{trans('detail.readmore')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
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
