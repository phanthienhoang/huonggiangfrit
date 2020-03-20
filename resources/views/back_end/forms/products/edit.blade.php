@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Sản phẩm</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="title"
                                    value="{{$product->name}}" required >
                                @error('name')
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn ngôn ngữ</label>
                                <select name="locale" class="custom-select language">
                                    <option value="vi" {{$product->locale == 'vi' ? 'selected' : null}}>Tiếng Việt
                                    </option>
                                    <option value="en" {{$product->locale == 'en' ? 'selected' : null}}>Tiếng Anh
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" class="custom-select language">
                                    <option value="1">Hiện
                                    </option>
                                    <option value="0">Ẩn
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <input type="hidden" id="category-product" value="{{$product->product->category_id}}" required>
                                <select name="category_id" class="custom-select category"></select>
                            </div>
                            <div class="form-group">
                                <label for="title">Code</label>
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="title"
                                    value="{{$product->code}}" required>
                                @error('code')
                                <p class="text-danger">{{ $errors->first('code') }}</p>
                                @enderror
                            </div>
            
                            <div class="form-group">
                                <label for="title">Feature</label>
                                <input type="text" name="features" class="form-control @error('features') is-invalid @enderror" id="title"
                                    value="{{$product->features}}" required>
                                @error('features')
                                <p class="text-danger">{{ $errors->first('features') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Áp dụng</label>
                                <input type="text" name="apply" class="form-control @error('apply') is-invalid @enderror" id="title"
                                    value="{{$product->apply}}" required>
                                @error('apply')
                                <p class="text-danger">{{ $errors->first('apply') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Bài men tham khảo</label>
                                <input type="text" name="refer_frit" class="form-control @error('refer_frit') is-invalid @enderror" id="title"
                                    value="{{$product->refer_frit}}" required>
                                @error('refer_frit')
                                <p class="text-danger">{{ $errors->first('refer_frit') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="inputFile">Choose file</label>
                                        <input type="file" name="images"
                                            class="custom-file-input @error('images') is-invalid @enderror"
                                            id="inputFile" value="{{$product->images}}">
                                    </div>
                                </div>
                                @error('images')
                                <p class="text-danger">{{ $errors->first('images') }}</p>
                                @enderror
                                <div class="mt-2">
                                    @if (!empty($product->images))
                                    <img class="w-25 img" src="{{$product->images}}" alt="">
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Thông số kỉ thuật</label>
                                <textarea class="textarea" name="specifications" placeholder="Nhập nội dung"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{$product->specifications}}</textarea>
                                @error('specifications')
                                <p class="text-danger">{{ $errors->first('specifications') }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{route('admin.products.index')}}"><i
                                    class="fa fa-times"></i> Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
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
      // Summernote
      $('.textarea').summernote({
          height: 150
      })
    })
    $('#inputFile').on('change', function(){
        if (typeof (FileReader) != "undefined") {
            var image_holder = $(".img");
            image_holder.empty();
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.img').attr('src', e.target.result);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
        } else {
                    alert("This browser does not support FileReader.");
        }
    })

    $('.language').on('change', function(){
        let locale = $('.language').val();
        $.ajax({
            url: "{{route('admin.getCategory')}}",
            method: 'GET',
            data:{
                'locale': locale
            },
            success:function(data) {
                $('.category').empty()
                $.each(data, function(i,v){
                    $('.category').append(
                        `<option value="${v.category_id}">${v.name}</option>`
                    )
                    if($('.category').find(`option[value=${v.category_id}]`).val() === $('#category-product').val()){
                        $('.category').find(`option[value=${v.category_id}]`).attr('selected', true)
                    }                })            
                }
        })
    })

    $(document).ready(function(){
        let locale = $('.language').val();
    $.ajax({
            url: "{{route('admin.getCategory')}}",
            method: 'GET',
            data:{
                'locale': locale
            },
            success:function(data) {
                $('.category').empty()
                $.each(data, function(i,v){
                    $('.category').append(
                        `<option value="${v.category_id}">${v.name}</option>`
                    )
                    if($('.category').find(`option[value=${v.category_id}]`).val() === $('#category-product').val()){
                        $('.category').find(`option[value=${v.category_id}]`).attr('selected', true)
                    } 
                    })
                }
        })
    });
</script>
@endpush