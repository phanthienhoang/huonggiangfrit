@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cổ đông</h1>
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
                        <h3 class="card-title">Thêm tin tức cổ đông</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.shareholder.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">tiêu đề</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Nhập tiêu đề">
                            </div>
                            <div class="form-group">
                                <label>Chọn trạng thái</label>
                                <select name="online" class="custom-select">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn ngôn ngữ</label>
                                <select name="locale" id='locale' class="custom-select language">
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>loại sản phẩm</label>
                                <select name="category" class="custom-select category">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="images" class="custom-file-input"
                                            id="inputFile">
                                        <label class="custom-file-label" for="inputFile">Choose file</label>
                                    </div>
                                    <div class="mt-2">
                                        <img class="w-25 img" src="" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contents">Nội dung</label>
                                <textarea class="textarea" name="contents"
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
            url: "{{route('admin.getShareholderCategory')}}",
            method: 'GET',
            data:{
                'locale': locale
            },
            success:function(data) {
                $('.category').empty()
                $.each(data, function(i,v){
                    $('.category').append(
                        `<option value="${v.category_id}">${v.title}</option>`
                    )
            })            }
        })
    })

    $(document).ready(function(){
        let locale = $('.language').val();
    $.ajax({
            url: "{{route('admin.getShareholderCategory')}}",
            method: 'GET',
            data:{
                'locale': locale
            },
            success:function(data) {
                console.log(data)
                $('.category').empty()
                $.each(data, function(i,v){
                    $('.category').append(
                        `<option value="${v.category_id}">${v.title}</option>`
                    )
                })
            }
        })
    });
</script>
@endpush