
@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 mt-5">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            @foreach($category_new_tran1 as $category_new_tran)
                                <h4 class="widget_title mt-5">{{$category_new_tran->name}}</h4>
                                @foreach($new_trans1->take(6) as $new_tran)
                                    @foreach($news1 as $new)
                                        @if($category_new_tran->category_id == $new->category_id && $new_tran->new_id == $new->id)
                                            <ul class="list cat-list">
                                                <a href="{{route('category.web.new.show',$new_tran->id)}}">
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
                    <h1 class="widget_title ">{{$category_new_tran->name}}</h1>
                    <div class="col-lg-9 posts-list mt-5">
                        <div class="single-post">
                            <div class="row">
                                <div class="col-5">
                                    <img class="img-fluid" src="{{$image}}" alt="" style="width: 700px">
                                    <div> <ul> {{$new_tran->created_at}}</ul></div>
                                </div>

                                <div class="col-7">
                                    <div>
                                        <h1 class="text-gray-dark">{{$name1}}</h1>
                                    </div>
                                    <p class="mt-5">
                                        {{$descrip}}
                                    </p>
                                </div>
                                <div class="text-dark mt-5">
                                    {!!$content!!} </div>
                            </div>
                        </div>
                    </div>

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

