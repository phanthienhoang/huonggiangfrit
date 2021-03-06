@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tin tức</h1>
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
                            <h3 class="card-title">Thêm Tin Tức</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('new.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tên tin tức</label>
                                    <input type="text" name="name" class="form-control" id="title"
                                           placeholder="Nhập tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label>Chọn ngôn ngữ</label>
                                    <select name="locale" class="custom-select">
                                        <option value="vi">Tiếng Việt</option>
                                        <option value="en">Tiếng Anh</option>
                                    </select>
                                    <label>Chọn tình trạng online</label>
                                    <select name="online" class="custom-select">
                                        <option value="1">Online</option>
                                        <option value="0">Not online</option>
                                    </select>

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
                                            <input type="file" name="images"
                                                   class="custom-file-input @error('images') is-invalid @enderror"
                                                   id="inputFile" value="{{ old('images')}}">
                                            <label class="custom-file-label" for="inputFile">Choose file</label>
                                        </div>
                                    </div>
                                    @error('images')
                                    <p class="text-danger">{{ $errors->first('images') }}</p>
                                    @enderror
                                    <div class="mt-2">
                                        <img class="w-25 img" src="" alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Nội dung</label>
                                    <textarea class="textarea" name="content" placeholder="Nhập nội dung"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
    </script>
@endpush
