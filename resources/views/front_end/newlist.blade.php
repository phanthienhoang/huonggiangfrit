@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            @foreach($category_new_tran1 as $category_new_tran)
                                <h4 class="widget_title mt-5">{{$category_new_tran->name}}</h4>
                                @foreach($new_trans->take(6) as $new_tran)
                                    @foreach($news1 as $new)
                                    @if($category_new_tran->category_id == $new->category_id && $new_tran->new_id == $new->id)
                                            <ul class="list cat-list"><a href="{{route('category.web.new.show',$new_tran->id)}}">
                                            {{$new_tran->name}}</a>
                                        </ul>
                                    @endif
                                    @endforeach
                                @endforeach
                            @endforeach
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 ">
                    <h1 class="widget_title mt-5">{{$name}}</h1>
                    @foreach($new_trans as $key => $value)
                        @foreach ($news as $new)
                            @if($value->new_id == $new->id)
                                <div class="col-lg-9 posts-list mt-5">
                                    <div class="single-post">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="{{route('category.web.new.show',$value->id)}}">
                                                    <img class="img-fluid" src="{{$value->image}}" alt=""></a>
                                                <div class="mt-2">{{$value->created_at }}</div>
                                            </div>
                                            <div class="col-7">
                                                <div>
                                                    <h2 class="text-gray-dark">
                                                        <a href="{{route('category.web.new.show',$value->id)}}">{{$value->name}}</a>
                                                    </h2>
                                                </div>
                                                <p class="mt-3">
                                                    {{$value->description}}
                                                </p>
                                                @if (App::getLocale() == "vi")
                                                    <a
                                                       href="{{route('category.web.new.show',$value->id)}}"> xem
                                                        thêm </a>
                                                @else
                                                    <a class="btn btn-warning"
                                                       href="{{route('category.web.new.show',$value->id)}}">see
                                                        more </a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                    <br><br>
{{--                    @if (App::getLocale() == "vi")--}}
{{--                        <div>Tin tức liên quan</div>--}}
{{--                    @else--}}
{{--                        <div> related news</div>--}}
{{--                    @endif--}}
                </div>


            </div>
        </div>
    </section>
@endsection

