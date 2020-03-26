@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 mt-5">
                </div>
                <div class="col-lg-9 ">
                    <div style="text-align:center"> <h1>{{trans('navbar.news')}} </h1></div>
                    <div class="col-lg-9 posts-list mt-5">
                        <div class="single-post">
                            <div class="row">
                                <div class="col-5">
                                    <img class="img-fluid" src="{{$new_tran->image}}" alt="" style="width: 700px">
                                    <div>
                                        <ul> {{$new_tran->created_at}}</ul>
                                    </div>
                                </div>

                                <div class="col-7">
                                    <h2>{{$new_tran->name}}</h2>
                                    <p class="mt-3">
                                        {{$new_tran->description}}
                                    </p>
                                </div>
                                <div class="text-dark mt-5">
                                    {!!$new_tran->content!!} </div>
                            </div>
                        </div>
                    </div>

                    <br><br>

                </div>
            </div>
        </div>
    </section>
@endsection

