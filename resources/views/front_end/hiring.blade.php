@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
<div class="whole-wrap">
	<div class="container box_1170">
		<div class="section-top-border">
			<h2 class="mb-30" style="text-align:center">{{trans('navbar.hiring')}}</h2>
			<div class="row">
				<div class="col-lg-12">
					<blockquote class="generic-blockquote" style="font-size:18px ;line-height: 33px;">
                    {{-- @if(isset($hires)) --}}
                    
                    @foreach ($hires as $hire)
                            {{$hire->title}} <br>

                            {{$hire->content}} <br>
                    @endforeach
                        
                    {{-- @endif --}}
                        


					</blockquote>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection

