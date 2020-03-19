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
                            <h3 class="card-title">Chi tiết tin tức</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ $new_tran->image }}" alt="sim_image"
                                        style="max-width: 350px">

                                    </div>

                                    <div class="col-7">
                                        <div class="form-group mt-5">
                                            <label for="title">Tên tin tức</label>
                                            <input type="text" name="name" class="form-control" id="title"
                                                   placeholder="Nhập tiêu đề" value="{{$new_tran->name}}">
                                        </div>

                                        <div class="form-group mt-5">
                                            <label>Loại tin tức </label>
                                            @foreach(\App\Category_new_tran::all() as $cate_new_tran)

                                                @if($cate_new_tran->locale == 'vi' && $cate_new_tran->category_id == \App\News::find($new_tran->new_id)->category_id )

                                                    <input type="text" value="{{$cate_new_tran->name}}">
                                                @endif
                                            @endforeach


                                            <label>Chọn tình trạng online</label>
                                            @if(\App\News::find($new_tran->new_id)->online == 1)
                                                <input type="text" value="Online">
                                            @else
                                                <input type="text" value=" Not online">
                                            @endif
                                        </div>

                                    </div>

                                </div>




                            </div>
                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" cols="30" rows="3"
                                      class="form-control" >{{$new_tran->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Nội dung</label>
                            <textarea class="textarea"  name="content" placeholder="Nhập nội dung"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$new_tran->content}}</textarea>
                        </div>
                            <!-- /.card-body -->

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

