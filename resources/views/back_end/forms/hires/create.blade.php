@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">TIN TỨC TUYỂN DỤNG</h1>
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
                        <h3 class="card-title">Thêm tin tuyển dụng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('tuyendung.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                    id="title" placeholder="Nhập tiêu đề" value="{{ old('title') }}">
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
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Nội Dung</label>
                                <textarea class="textarea @error('content') is-invalid @enderror" name="content"
                                    {{ old('content') }}>
                                
                                </textarea>
                                @error('content')
                                <p class="text-danger">{{ $errors->first('content') }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{route('tuyendung.index')}}"><i
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
          height: 300
      })
    })
</script>
@endpush