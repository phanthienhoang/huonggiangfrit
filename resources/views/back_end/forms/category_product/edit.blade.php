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
                        <h3 class="card-title">Chỉnh sửa loaị sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('category-products.update',$atribute->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tên loại sản phẩm</label>
                                <input type="text" name="name" value="{{$atribute->name}}" class="form-control @error('name') is-invalid @enderror"
                                    id="title" required>
                                @error('name')
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Chọn trạng thái</label>
                                <select name="status" class="custom-select">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn ngôn ngữ</label>
                                <select name="locale" class="custom-select">
                                    @if (Session::get('language') === 'vi')
                                    <option value="vi" {{$atribute->locale == 'vi' ? 'selected' : null}}>Tiếng Việt
                                    </option>
                                    @else
                                    <option value="en" {{$atribute->locale == 'en' ? 'selected' : null}}>Tiếng Anh
                                    </option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" value="" id="description" cols="30" rows="3"
                                    class="form-control @error('description') is-invalid @enderror" required>{{$atribute->description}}</textarea>
                                @error('description')
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="inputFile">Choose file</label>
                                            <input type="file" name="images"
                                                class="custom-file-input @error('images') is-invalid @enderror"
                                                id="inputFile" value="{{$atribute->images}}">
                                        </div>
                                    </div>
                                    @error('images')
                                    <p class="text-danger">{{ $errors->first('images') }}</p>
                                    @enderror
                                    <div class="mt-2">
                                        @if (!empty($atribute->images))
                                        <img class="w-25 img" src="{{$atribute->images}}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Nội dung</label>
                                <textarea class="textarea" name="contents" placeholder="Nhập nội dung" value=""
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                                    {{$atribute->contents}}
                                    </textarea>
                                @error('content')
                                <p class="text-danger">{{ $errors->first('content') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{route('category-products.index')}}"><i
                                    class="fa fa-times"></i> Cancel</a>
                        </div>
                    </form>
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
      // Summernote
      $('.textarea').summernote({
          height: 600
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
</script>
@endpush
