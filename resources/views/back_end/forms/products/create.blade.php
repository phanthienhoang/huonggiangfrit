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
                    <form role="form" action="{{ route('products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="title" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
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
                                <select name="locale" class="custom-select language">
                                    <option value="vi">Tiếng Việt</option>
                                    <option value="en">Tiếng Anh</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select name="category_id" class="custom-select category"></select>
                            </div>
                            <div class="form-group">
                                <label for="title">Mã frit</label>
                                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                    id="title" placeholder="Nhập code sản phẩm" value="{{ old('code') }}">
                                @error('code')
                                <p class="text-danger">{{ $errors->first('code') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Đặc điểm</label>
                                <input type="text" name="features"
                                    class="form-control @error('features') is-invalid @enderror" id="title"
                                    value="{{ old('features') }}">
                                @error('features')
                                <p class="text-danger">{{ $errors->first('features') }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Áp dụng</label>
                                <input type="text" name="apply"
                                    class="form-control @error('apply') is-invalid @enderror" id="title"
                                    value="{{ old('apply') }}">
                                @error('apply')
                                <p class="text-danger">{{ $errors->first('apply') }}</p>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label for="title">Bài men tham khảo</label>
                                <input type="text" name="refer_frit"
                                    class="form-control @error('refer_frit') is-invalid @enderror" id="title"
                                    value="{{ old('refer_frit') }}">
                                @error('refer_frit')
                                <p class="text-danger">{{ $errors->first('refer_frit') }}</p>
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
                                <label for="description">Thông số kỉ thuật</label>
                                <textarea class="textarea @error('specifications') is-invalid @enderror" name="specifications"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    <div align="center" style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif;"><div align="center"><table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="513" style="width: 308pt; margin-left: 5.15pt;"><tbody><tr style="height: 36.95pt;"><td width="193" nowrap="" style="width: 116pt; border: 1pt solid windowtext; background: rgb(226, 239, 218); padding: 0in 5.4pt; height: 36.95pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; font-size: 15px; line-height: 24px; text-align: center;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">Chỉ tiêu<o:p></o:p></span></span></p></td><td width="162" style="width: 97pt; border-top: 1pt solid windowtext; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-image: initial; border-left: none; background: rgb(226, 239, 218); padding: 0in 5.4pt; height: 36.95pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; font-size: 15px; line-height: 24px; text-align: center;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">FRIT HGT05<br>(Frit trong)<o:p></o:p></span></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">SiO2<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">58-65<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">Al2O3<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">5-8<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">Na2O<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">1-4<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">K2O<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">2-6<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">CaO<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">10-15<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">MgO<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">1-4<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">BaO<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">1-5<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">ZnO<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">5-9<o:p></o:p></span></p></td></tr><tr style="height: 21pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">B2O3<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">2-6<o:p></o:p></span></p></td></tr><tr><td width="193" nowrap="" style="text-align: center; width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 21pt;"><span style="font-size: 17.3333px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);">SrO</span></span></td><td width="162" nowrap="" style="text-align: center; width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 21pt;"><br></td></tr><tr style="height: 31.5pt;"><td width="193" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 31.5pt;">
                                        <p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">T.P. (oC)<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 31.5pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">630±15<o:p></o:p></span></p></td></tr><tr style="height: 30.75pt;"><td width="193" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 30.75pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">S.P. (oC)<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 30.75pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">816±15<o:p></o:p></span></p></td></tr><tr style="height: 20.25pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 20.25pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; font-size: 15px; line-height: 24px; text-align: center;"></p><div style="text-align: center;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">COE</span></span></div><span style="font-weight: bolder; color: rgb(34, 34, 34);"><div style="text-align: center;"><span style="font-weight: bolder;"><span style="font-size: 13pt;">3α*10 ̄ ⁷</span></span></div></span><p></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 20.25pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">207±9<o:p></o:p></span></p></td></tr><tr style="height: 19.5pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 19.5pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">Nhiệt độ nung (˚C)<o:p></o:p></span></span></p></td><td width="162" nowrap="" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 19.5pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">1080-1135<o:p></o:p></span></p></td></tr><tr style="height: 23.25pt;"><td width="193" nowrap="" style="width: 116pt; border-right: 1pt solid windowtext; border-bottom: 1pt solid windowtext; border-left: 1pt solid windowtext; border-image: initial; border-top: none; padding: 0in 5.4pt; height: 23.25pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">Áp dụng<o:p></o:p></span></span></p></td><td width="162" style="width: 97pt; border-top: none; border-left: none; border-bottom: 1pt solid windowtext; border-right: 1pt solid windowtext; padding: 0in 5.4pt; height: 23.25pt;"><p class="MsoNormal" align="center" style="margin: 3pt 0in; text-align: center; font-size: 15px; line-height: 24px;"><span style="font-size: 13pt;">Ốp tường<o:p></o:p></span></p></td></tr></tbody></table></div><h2 times="" new="" roman";"="" style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: left;"><span style="font-family: Roboto, sans-serif; font-size: 15px; font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;"><br></span></span></h2><h2 times="" new="" roman";"="" style="font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0); text-align: left;"><span style="font-family: Roboto, sans-serif; font-size: 15px; font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt;">B</span></span><span style="font-family: Roboto, sans-serif; font-size: 15px; font-weight: bolder; color: rgb(34, 34, 34);"><span lang="vi" style="font-size: 13pt;">ài men bóng<span style="letter-spacing: -0.05pt;">&nbsp;</span></span></span><span style="font-family: Roboto, sans-serif; font-size: 15px; font-weight: bolder; color: rgb(34, 34, 34);"><span style="font-size: 13pt; letter-spacing: -0.05pt;">tham khảo</span></span><span style="font-family: Roboto, sans-serif; font-size: 15px; font-weight: bolder; color: rgb(34, 34, 34);"><span lang="vi" style="font-size: 13pt;">:</span></span><br></h2><table style="color: rgb(0, 0, 0); font-size: medium; font-family: arial, sans-serif; width: 1023.2px;"><tbody><tr><th style="text-align: left; border: 1px solid rgb(221, 221, 221); padding: 8px;"><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 17.3333px; text-align: center; text-indent: 7.33333px;">&nbsp; &nbsp;&nbsp;<span style="font-family: &quot;Times New Roman&quot;;">&nbsp; Sản phẩm</span></span><br></th><th style="text-align: left; border: 1px solid rgb(221, 221, 221); padding: 8px;"><span style="text-align: center; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; font-weight: bolder;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">&nbsp; &nbsp; Frit/Kaolin</span></span><span style="text-align: center; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; font-weight: bolder;"><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">&nbsp;(%)</span></span><br></th><th style="text-align: left; border: 1px solid rgb(221, 221, 221); padding: 8px;"><p source="" sans="" pro",="" -apple-system,="" blinkmacsystemfont,="" "segoe="" ui",="" roboto,="" "helvetica="" neue",="" arial,="" sans-serif,="" "apple="" color="" emoji",="" ui="" symbol";="" font-size:="" 16px;="" font-weight:="" 400;="" text-align:="" center;"=""><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 4.13333px; font-weight: bolder;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">&nbsp; &nbsp; &nbsp; &nbsp;Sót sàng</span></span><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 4.13333px; font-weight: bolder;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">&nbsp;</span></span><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 4.13333px; font-weight: bolder;"><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">325&nbsp;</span></span></p><p source="" sans="" pro",="" -apple-system,="" blinkmacsystemfont,="" "segoe="" ui",="" roboto,="" "helvetica="" neue",="" arial,="" sans-serif,="" "apple="" color="" emoji",="" ui="" symbol";="" font-size:="" 16px;="" font-weight:="" 400;="" text-align:="" center;"=""><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 4.13333px; font-weight: bolder;"><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">&nbsp;mesh</span></span><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 4.13333px; font-weight: bolder;"><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">(</span></span><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 4.13333px; font-weight: bolder;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">g/100ml)</span></span><span style="color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 4.13333px; font-weight: bolder;"><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;(%)</span></span></p></th><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><p class="TableParagraph" style="margin: 0in 7.05pt 0.0001pt 7.5pt; text-align: center; font-family: Roboto, sans-serif; font-size: 15px; line-height: 24px; color: rgb(33, 37, 41);"><span style="font-weight: bolder;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">Nhiệt&nbsp;</span></span><span style="font-weight: bolder;"><span lang="vi" style="font-size: 13pt;"><span style="font-family: &quot;Times New Roman&quot;;">độ nung</span><o:p></o:p></span></span></p><p class="TableParagraph" 
                                        style="margin: 0in 7.05pt 0.0001pt 7.45pt; text-align: center; font-family: Roboto, sans-serif; font-size: 15px; line-height: 24px; color: rgb(33, 37, 41);"><span style="font-weight: bolder;"><span lang="vi" style="font-size: 13pt;"><span style="font-family: &quot;Times New Roman&quot;;">(</span><span style="letter-spacing: -0.15pt; font-family: &quot;Times New Roman&quot;;">&nbsp;</span><span style="font-family: &quot;Times New Roman&quot;;">ºC)</span></span></span></p></td><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><p class="TableParagraph" style="margin: 0in 6.4pt 0.0001pt 6.85pt; text-align: center; font-family: Roboto, sans-serif; font-size: 15px; line-height: 24px; color: rgb(33, 37, 41);"><span style="font-weight: bolder;"><span lang="vi" style="font-size: 13pt;"><span style="font-family: &quot;Times New Roman&quot;;">Chu kì nung</span><o:p></o:p></span></span></p><p class="TableParagraph" style="margin: 0in 4.3pt 0.0001pt 4.65pt; text-align: center; font-family: Roboto, sans-serif; font-size: 15px; line-height: 24px; color: rgb(33, 37, 41);"><span style="font-weight: bolder;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">(phút)</span></span></p></td><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><span style="text-align: center; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 8.8px; font-weight: bolder;"><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Áp</span></span><span style="text-align: center; color: rgb(33, 37, 41); font-family: Roboto, sans-serif; font-size: 15px; text-indent: 8.8px; font-weight: bolder;"><span style="font-size: 13pt;"><span style="font-family: &quot;Times New Roman&quot;;">&nbsp;</span><span lang="vi" style="font-family: &quot;Times New Roman&quot;;">dụng</span></span></span><br></td></tr><tr><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><span style="font-weight: bolder;">HTG05</span></td><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, serif;">90-94/6-10</span><br></td><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, serif;">3-</span><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, serif;">6</span><br></td><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, serif;">1080-11</span><span style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, serif;">1</span><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, serif;">5</span><br></td><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;"><span lang="vi" style="font-size: 13pt; font-family: &quot;Times New Roman&quot;, serif;">35-50</span><br></td><td style="border: 1px solid rgb(221, 221, 221); padding: 8px;">Ốp Tường<br></td></tr></tbody></table>
                                    </div>
                                    {{ old('content') }}</textarea>
                                @error('specifications')
                                <p class="text-danger">{{ $errors->first('specifications') }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{route('products.index')}}"><i
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
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.0/css/bulma.min.css"> --}}

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