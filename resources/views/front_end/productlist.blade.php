@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
<section class="blog_area single-post-area section-padding">
   <div class="container-fluid">
      <div class="row">
         <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link bg-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="">{{$cate_gory->name}} {{trans('detail.include')}} :</a>
                  @foreach($cate_gory->product_trans as $key => $value)
            <a class="nav-link bg-light" id="v-pills-{{$value->name}}-tab" data-toggle="pill" href="#v-pills-{{$value->id}}" role="tab" aria-controls="v-pills-profile" aria-selected="{{$value->id ==''}}">{{$value->name}}</a>
                  @endforeach
            </div>
         </div>
         <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
               <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                  <div class="col-lg-9 posts-list">
                     <div class="single-post">
                        <div class="row">
							@if($cate_gory->name=="FRIT TRONG" || $cate_gory->name == "TRANSPARENT FRIT")
							   	@if (App::getLocale() == "vi")
								<div class="col-12" style ="text-align:center ; font-size:40px"> <strong>FRIT TRONG</strong> </div>
								@else
								<div class="col-12" style ="text-align:center ; font-size:40px"> <strong>TRANSPARENT FRIT</strong> </div>
								@endif
							@else
                           <div class="col-3">
                                 <img width=300px class="img-fluid" src="{{$cate_gory->images}}" alt="">
                           </div>
                           <div class="col-9">
                              <div>
                                 <h1>{{$cate_gory->name}}</h1>
                              </div>
                                 <p>
                                 {{$cate_gory->description}}
                                 </p>
                           </div>
							@endif
                        </div>
                     </div>
                  </div>
				   <div class="blog_details">
                           {!!$cate_gory->contents!!}
                   </div>
               </div>
              @foreach($cate_gory->product_trans as $key => $value)
                  <div class="tab-pane fade" id="v-pills-{{$value->id}}" role="tabpanel" aria-labelledby="v-pills-a-tab">

                     <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="col-lg-9 posts-list">
                           <div class="single-post">
                              <div class="row">
                                 <div class="col-3">
                                       <img  width=300px class="img-fluid" src="{{$value->images}}" alt="">
                                 </div>
                                 <div class="col-9">
                                    <div>
                                       <h1>{{$value->name}}</h1>
                                    </div>
                                       <p>
                                          FRIT CODE: {{$value->code}}
                                       </p>
                                       <p>
                                          {{trans('detail.apply')}}: {{$value->apply}}
                                       </p>
                                       <p>
                                          {{trans('detail.characteristic')}}: {{$value->features}}
                                       </p>
                                       <p>
                                          {{trans('detail.reference')}}: {{$value->refer_frit}}
                                       </p>
                                 </div>
                              </div>

                              {{trans('detail.specifications')}} :
                              <div class="blog_details">
                                 {!!$value->specifications!!}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @endforeach
              
            </div>
          </div>
      </div>
   </div>
</section>
@endsection
