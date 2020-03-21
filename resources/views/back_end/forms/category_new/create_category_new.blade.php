
@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Loại tin tức</h1>
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
                            <h3 class="card-title">Thêm loại tin tức</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('category_new.store')}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="locale"  id="">
                                    <option for="title"  value="vi">Tên loại tin tức tiêng Việt</option>

                                    <option for="title" value="en">Tên loại tin tức tiêng Anh</option>
                                    </select>

                                    <input type="text" name="name" class="form-control mt-4" id="title"
                                           placeholder="Nhập tên loại tin tức ">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Tạo mới</button>
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
    </script>
@endpush
