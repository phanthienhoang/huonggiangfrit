@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Loại sản phẩm</h1>
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
                    <form role="form" action="{{ route('category-products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tên loại sản phẩm</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="title" placeholder="Nhập tiêu đề" value="{{ old('name') }}">
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
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" cols="30" rows="3"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                                @enderror
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
                                <textarea class="textarea @error('contents') is-invalid @enderror" name="contents"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    
                                    <p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px; text-align: justify;"><span style="font-size: 14px;"><strong>1.&nbsp;Thành phần hóa (%)</strong></span></p><table border="1" cellpadding="1" cellspacing="0" width="518" style="font-family: Arial; font-size: 13px; width: 930px;"><colgroup><col><col><col><col><col><col><col><col><col><col><col><col><col><col><col></colgroup><tbody><tr height="43"><td style="height: 43px; width: 41px; text-align: center; background-color: rgb(204, 255, 255);"><strong>Mã frit</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>SiO<sub>2</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>Al<sub>2</sub>O<sub>3</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>Na<sub>2</sub>O</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>K<sub>2</sub>O</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>CaO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>MgO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>BaO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>ZnO</strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>B<sub>2</sub>O<sub>3</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>ZrO<sub>2</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>P<sub>2</sub>O<sub>5</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>TiO<sub>2</sub></strong></td><td style="text-align: center; width: 41px; height: 43px; background-color: rgb(204, 255, 255);"><strong>SrO</strong></td><td style="width: 41px; text-align: center; height: 43px; background-color: rgb(204, 255, 255);"><strong>Sử dụng</strong></td></tr><tr height="22"><td height="22" style="height: 23px; text-align: center;"><a href="http://frithue.com.vn/products/frit-duc/p2-21/frit-duc--ho062.html" style="cursor: pointer;"><span style="color: rgb(0, 0, 205);"><strong>HO062</strong></span></a></td><td style="text-align: center;">57-60</td><td style="text-align: center;">4-6</td><td style="text-align: center;">1-3</td><td style="text-align: center;">3-4</td><td style="text-align: center;">8-10</td><td style="text-align: center;">2-4</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">10-13</td><td style="text-align: center;">0-3</td><td style="text-align: center;">7-8</td><td style="text-align: center;">1-3</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">&nbsp;F, W&nbsp;</td></tr><tr height="22"><td height="22" style="height: 23px; text-align: center;"><a href="http://frithue.com.vn/products/frit-duc/p2-22/frit-duc--ho240.html" style="cursor: pointer;"><span style="color: rgb(0, 0, 205);"><strong>HO240</strong></span></a></td><td style="text-align: center;">55-58</td><td style="text-align: center;">1-3</td><td style="text-align: center;">1-2</td><td style="text-align: center;">2-5</td><td style="text-align: center;">5-7</td><td style="text-align: center;">1-3</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">12-14</td><td style="text-align: center;">4-5</td><td style="text-align: center;">6-9</td><td style="text-align: center;">0-2</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">&nbsp;</td><td style="text-align: center;">&nbsp;W&nbsp;</td></tr></tbody></table><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px;">&nbsp;</p><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px;"><span style="font-size: 14px;"><strong style="font-family: arial, helvetica, sans-serif;">2. Đặc tính sử dụng của bài men trắng đục:</strong></span></p><table align="left" border="1" cellpadding="1" cellspacing="0" width="920" style="font-family: Arial; font-size: 13px; width: 929.6px;"><tbody><tr><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><b>Mã Frit</b></p></td><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><strong>FRIT/KAOLIN</strong></p></td><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><strong>Sót sàng (325 mesh/100ml), (%)</strong></p></td><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><strong>Nhiệt độ nung (<sup>o</sup>C)</strong></p></td><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><strong>Chu kỳ nung (Phút)</strong></p></td><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><strong>COE=3α.10<sup>-7</sup>K<sup>-1</sup></strong></p></td><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><strong>T.P.&nbsp;<sup>o</sup>C</strong></p></td><td style="width: 76px; height: 43px; background-color: rgb(204, 255, 255);"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><strong>S.P.&nbsp;<sup>o</sup>C</strong></p></td></tr><tr><td style="width: 76px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><a href="http://frithue.com.vn/products/frit-duc/p2-21/frit-duc--ho062.html" style="cursor: pointer;"><span style="color: rgb(0, 0, 205);"><strong>HO062</strong></span></a></p></td><td style="width: 143px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">88-92/08-12</p></td><td style="width: 161px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">5-7</p></td><td style="width: 113px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">1125-1145</p></td><td style="width: 113px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">45-60</p></td><td style="width: 142px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">189-207</p></td><td style="width: 86px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">600-630</p></td><td style="width: 85px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">775-805</p></td></tr><tr><td style="width: 76px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;"><a href="http://frithue.com.vn/products/frit-duc/p2-22/frit-duc--ho240.html" style="cursor: pointer;"><span style="color: rgb(0, 0, 205);"><strong>HO240</strong></span></a></p></td><td style="width: 143px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">90-93/07-10</p></td><td style="width: 161px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">3-5</p></td><td style="width: 113px;">
                                    <p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">1100-1130</p></td><td style="width: 113px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">35-45</p></td><td style="width: 142px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">186-204</p></td><td style="width: 86px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">602-632</p></td><td style="width: 85px;"><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; text-align: center;">759-789</p></td></tr></tbody></table><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px;">&nbsp;</p><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px; text-align: justify;"><br></p><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px; text-align: justify;"><br></p><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px; text-align: justify;"><br></p><p style="margin-block-start: 0em; margin-block-end: 0em; padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 18px; font-family: Arial; font-size: 13px; text-align: justify;"><br></p>



                                    {{ old('content') }}
                                
                                </textarea>
                                @error('contents')
                                <p class="text-danger">{{ $errors->first('contents') }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{route('category-products.index')}}"><i
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