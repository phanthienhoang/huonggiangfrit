@extends('back_end.layouts.app')
@section('title', 'Detail')
@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Chi tiết 
                        <div class=" float-right">
                            <a href="{{ route('admin.products.create')}}" type="button" id="create_room_type"
                               class="btn btn-primary"><i class="fa fa-plus"></i>Thêm sản phẩm</a>
                        </div>   
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<section class="content">
<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-3">
        <h3 class="d-inline-block d-sm-none"></h3>
        <div class="col-12">
          <img src="{{$product->images}}" class="product-image" alt="Product Image">
        </div>
      </div>
      <div class="col-12 col-sm-9">
        <h3 class="my-3">{{$product->name}}</h3>
        <p>Đặc điểm: {{$product->features}}</p>
        <p>Áp dụng: {{$product->apply}}</p>
        <p>Bài men tham khảo: {{$product->refer_frit}}</p>
      </div>
    </div>
    <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Thông số kỉ thuật</a>
          <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Trạng Thái</a>
          <!-- <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a> -->
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
            <div class="content">
              {!!$product->specifications!!}
            </div>
            
        </div>
        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
        
         </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
@push('style')
<link rel="stylesheet" href="/backend/plugins/summernote/summernote-bs4.css">
@endpush
@push('script')
<script src="/backend/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
      $('.textarea').summernote({
          height: 500
      })
    })
</script>
@endpush