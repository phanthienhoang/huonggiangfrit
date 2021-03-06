@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')

    <style>

        #product-list {
            display: flex;
            padding: 2rem;
            justify-content: center;
        }

        #product-list .product {
            width: 30%;
            float: left;
            margin-left: 3.3%;
            display: block;
        }

        #product-list .product:first-child {
            margin-left: 0;
        }

        #product-list .product .imgcate {
            box-sizing: border-box;
            height: 300px;
            width: 100%;
            overflow: hidden;
        }

        .titlecate{
            color: #4d4d4d;
        }

        .nameaaaaaa{
            color: #808080;
            overflow: hidden;
            text-overflow: ellipsis;
            align-self: flex-end;
        }


        .imgcate>img{

            object-fit: cover;
            display: block;
            width: 100%;
            max-width: none;
            height: 100%;
        }

    </style>
    <section class="blog_area single-post-area section-padding">
        <div style="text-align:center"><h3>{{trans('navbar.news')}} </h3>
        </div>
        <div class="container-fluid">
            <div id="product-list">
                @foreach($new_trans as $new_tran)

                    <div class="product">
                        <div class="imgcate"><a href="{{route('showNews.web',$new_tran->id)}}"><img
                                    src="{{$new_tran->image}}"/></a>
                        </div>
                        <h3 class="titlecate"><a href="{{route('showNews.web',$new_tran->id)}}">{{$new_tran->name}}</a></h3>
                        <div class="nameaaaaaa">{{$new_tran->description}}
                        </div>
                    </div>

                @endforeach

            </div>
            {{$new_trans->links()}}
        </div>

    </section>
@endsection

