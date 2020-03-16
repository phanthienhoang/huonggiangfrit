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
                        <h3 class="card-title">Thêm sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="title"
                                    placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Chọn ngôn ngữ</label>
                                <select name="locale" class="custom-select language">
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                {{-- <div class="category">

                                </div> --}}
                                <select name="category_id" class="custom-select category">
                                    {{-- @foreach (App\Category_product_tran::all() as $item)
                                    <option value="{{$item->category_id}}">
                                    {{ $item->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Code</label>
                                <input type="text" name="code" class="form-control" id="title"
                                    placeholder="Nhập code sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="title">Price</label>
                                <input type="text" name="price" class="form-control" id="title"
                                    placeholder="Nhập giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="title">Feature</label>
                                <input type="text" name="features" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Line graphs of frit thermal expansion</label>
                                <input type="text" name="line_graph" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="title">Flattening curve and characteristic temperatures</label>
                                <input type="text" name="flattening_curve" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" cols="30" rows="3"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="images" class="custom-file-input" id="inputFile">
                                        <label class="custom-file-label" for="inputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <img class="w-25 img" src="" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Nội dung</label>
                                <textarea class="textarea" name="content"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                })            }
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
                })
                }
        })
    });
</script>
@endpush