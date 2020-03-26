@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
<section class="blog_area single-post-area section-padding">
   <div class="container-fluid">
      <div class="row">
         <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link bg-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$cate_gory->name}} {{trans('detail.include')}} :</a>
                  @foreach($cate_gory->product_trans as $key => $value)
                     <a class="nav-link bg-light" id="v-pills-{{$value->name}}-tab" data-toggle="pill" href="#v-pills-{{$value->id}}" role="tab" aria-controls="v-pills-profile" aria-selected="false">{{$value->name}}</a>
                  @endforeach
            </div>
         </div>
         <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
               <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="col-lg-9 posts-list">
                    <div class="single-post">
                       <div class="row">
                          <div class="col-3">
                                <img  width=300px class="img-fluid" src="{{$product_trans->images}}" alt="">
                          </div>
                          <div class="col-9">
                             <div>
                                <h1>{{$product_trans->name}}</h1>
                             </div>
                                <p>
                                   FRIT CODE: {{$product_trans->code}}
                                </p>
                                <p>
                                   {{trans('detail.apply')}}: {{$product_trans->apply}}
                                </p>
                                <p>
                                   {{trans('detail.characteristic')}}: {{$product_trans->features}}
                                </p>
                                <p>
                                   {{trans('detail.reference')}}: {{$product_trans->refer_frit}}
                                </p>
                          </div>
                       </div>

                       {{trans('detail.specifications')}} :
                       <div class="blog_details">
                          {!!$product_trans->specifications!!}
                       </div>
                    </div>
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
