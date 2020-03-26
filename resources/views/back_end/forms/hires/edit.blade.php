@extends('back_end.layouts.app')
@section('title', 'Form')
@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chỉnh sửa tin tuyển dụng</h1>
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
                        <h3 class="card-title">Chỉnh sửa tin tuyển dụng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('tuyendung.update',$atribute->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tiêu Đề</label>
                                <input type="text" name="title" value="{{$atribute->title}}" class="form-control @error('title') is-invalid @enderror"
                                    id="title" required>
                                @error('title')
                                <p class="text-danger">{{ $errors->first('title') }}</p>
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
                                <label for="description">Nội dung</label>
                                <textarea class="textarea" name="content" placeholder="Nhập nội dung" value=""
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>
                                    {{$atribute->content}}
                                    </textarea>
                                @error('content')
                                <p class="text-danger">{{ $errors->first('content') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{route('tuyendung.index')}}"><i
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
          height: 400
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
