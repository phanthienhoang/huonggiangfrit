@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
<div class="whole-wrap">
	<div class="container box_1170">
		<div class="section-top-border">
			<h2 class="mb-30" style="text-align:center">{{trans('navbar.about')}}</h2>
			<div class="row">
				<div class="col-md-3">
					<img src="/assets/img/huonggiang/5c341e5c8e8975d72c98-removebg-preview.png" alt="" class="img-fluid">
				</div>
				<div class="col-md-9 mt-sm-20">
					<p style="font-size:25px ;line-height: 30px;">{{trans('about.vechungtoi')}}</p>

					<p style="font-size:20px;line-height: 30px;">{{trans('about.vechungtoi2')}}</p>
				</div>
			</div>
		</div>
		<div style="font-size:22px ;line-height: 30px;" >

			&emsp;&emsp;{{trans('about.hue')}}<br>

			&emsp;&emsp;{{trans('about.thanhlap')}}<br>

			&emsp;&emsp;{{trans('about.lacongty')}}<br>
			&emsp;&emsp;{{trans('about.muctieu')}}<br>
			&emsp;&emsp;{{trans('about.chuyennganh')}}


		</div>
		<div class="section-top-border">
			<h3 class="mb-30">{{trans('about.daychuyen')}}</h3>
			<div class="row">
				<div class="col-lg-12">
					<blockquote class="generic-blockquote" style="font-size:18px ;line-height: 33px;">
						&emsp;&emsp;{{trans('about.congnghe1')}}<br/>
						&emsp;&emsp;{{trans('about.congnghe2')}}<br/>
						&emsp;&emsp;{{trans('about.congnghe3')}}
					</blockquote>
				</div>
			</div>
		</div>
		<div class="section-top-border">
			<h3>{{trans('navbar.photolibrary')}}</h3>
			<div class="row gallery-item">
				<div class="col-md-4">
					<a href="/assets/img/huonggiang/e6a440c5d4102f4e7601.jpg" class="img-pop-up" >
						<div class="single-gallery-image" style="background: url(/assets/img/huonggiang/e6a440c5d4102f4e7601.jpg);">							</div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="/assets/img/huonggiang/f547681fe5ca1e9447db.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(/assets/img/huonggiang/f547681fe5ca1e9447db.jpg);"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="/assets/img/huonggiang/chuyengia.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(/assets/img/huonggiang/chuyengia.jpg);"></div>
					</a>
				</div>
				<div class="col-md-6">
					<a href="" class="img-pop-up">
						<div class="single-gallery-image" style="background: url();"></div>
					</a>
				</div>
				<div class="col-md-6">
					<a href="" class="img-pop-up">
						<div class="single-gallery-image" style="background: url();"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="" class="img-pop-up">
						<div class="single-gallery-image" style="background: url();"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="" class="img-pop-up">
						<div class="single-gallery-image" style="background: url();"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="" class="img-pop-up">
						<div class="single-gallery-image" style="background: url();"></div>
					</a>
				</div>
			</div>
		</div>
		<div class="section-top-border">
			<h3 class="mb-30">{{trans('about.sanphamchuluc')}}</h3>
			<div class="row">
				@foreach ($product_trans as $item)
				<div class="col-md-4">
					<div class="single-defination">
					<h4 class="mb-20">{{$item->name}}</h4>
						<p>
							{{trans('detail.characteristic')}}: {{$item->features}}.</br>
							{{trans('detail.apply')}}: {{$item->apply}}.</br>
							{{trans('detail.reference')}}: {{$item->refer_frit}}
						</p>
                    <a class="btn" href="{{ route('product.readmore', $item->id) }}"> {{trans('detail.readmore')}}</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
	<script src="/assets/js/gijgo.min.js"></script>
@endpush
