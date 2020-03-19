@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
<section class="blog_area single-post-area section-padding">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget post_category_widget">
                  <h4 class="widget_title">Sản phẩm thuộc dòng {{$cate_gory->name}}</h4>
                  <ul class="list cat-list">
                     @foreach($cate_gory->product_trans as $key => $value)
                     <li>
                        <a href="#" class="d-flex">
                           <p>{{ $value->name }}</p>
                        </a>
                     </li>
                     @endforeach
                  </ul>
               </aside>
            </div>
         </div>


         <div class="col-lg-9 posts-list">
            <div class="single-post">
               <div class="row">
                  <div class="col-2">
                        <img class="img-fluid" src="{{$cate_gory->images}}" alt="">
                  </div>
                  <div class="col-7">
                     <div>
                        <h1>{{$cate_gory->name}}</h1>
                     </div>
                        <p>
                        {{$cate_gory->description}}
                        </p>
                  </div>
               </div>

               <div class="blog_details">
                  {!!$cate_gory->contents!!}
               </div>

               <div>

               sản phẩm liên quang
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
