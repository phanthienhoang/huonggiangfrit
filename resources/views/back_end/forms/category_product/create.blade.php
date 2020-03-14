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
                        <h3 class="card-title">Thêm loại sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tên loại sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="title"
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
                                <select name="locale" class="custom-select">
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select name="category_id" class="custom-select">
                                    @foreach($category_product as $key =>$value)
                                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" cols="30" rows="3"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="images" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Nội dung</label>
                                <textarea class="textarea" name="contents" placeholder="Nhập nội dung"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    
                                    
                                    <table border="1" cellpadding="1" cellspacing="0" width="518" style="font-family: Arial; font-size: 13px; width: 930px;"><tbody><tr height="43"><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>SiO<sub>2</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>Al<sub>2</sub>O<sub>3</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>Na<sub>2</sub>O</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>K<sub>2</sub>O</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>CaO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>MgO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>BaO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>ZnO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>B<sub>2</sub>O<sub>3</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>ZrO<sub>2</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>P<sub>2</sub>O<sub>5</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>TiO<sub>2</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>SrO</strong></td></tr><tr height="22"><td style="text-align: center;"><br></td><td style="text-align: center;"><br></td><td style="text-align: center;"><br></td><td style="text-align: center;"><br></td><td style="text-align: center;"><br></td><td style="text-align: center;"><br></td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;"><br></td><td style="text-align: center;"><br></td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">&nbsp;</td></tr></tbody></table>
                                    
                                    
                                    </textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

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
</script>
@endpush