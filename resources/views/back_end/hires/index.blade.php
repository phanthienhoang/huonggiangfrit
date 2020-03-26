@extends('back_end.layouts.app')
@section('title', 'Hire News')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Tin Tuyển Dụng
                        <div class=" float-right">
                            <a href="{{ route('tuyendung.create')}}" type="button" id="create_room_type"
                               class="btn btn-primary"><i class="fa fa-plus"></i>Thêm tuyển dụng mới</a>
                        </div>
                    </h1>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách tin tuyển dụng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (count($hires) === 0)
                            <h2 class="text text-center text-info">Chưa Có Thông Tin Tuyển Dụng</h2>
                        @else

                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
                                <th class="action">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($hires as $hire)
                                <tr>
                                    <td style="max-width: 200px;">
                                        @if (empty($hire->title))
                                            <li class="text-danger">dữ liệu trống</li>
                                        @else
                                            <li class="text-truncate">{{$hire->title}}</li>
                                        @endif
                                    </td>
                                    <div>
                                        <td style="max-width: 200px;">
                                            <li class="text-truncate">{{$hire->content }} </li>
                                        </td>
                                    </div>
                                    <div>
                                        <td style="max-width: 200px;">
                                            <li class="text-truncate">{{$hire->created_at }} </li>
                                        </td>
                                    </div>
                                    <td>
                                        <div class="d-inline-block">
                                            <div class="btn bg-warning" style="width: 90px">
                                                    <a class=" text-center"
                                                       href="{{ route('tuyendung.edit',$hire->id) }}">cập nhập</a>
                                            </div>
                                        </div>
                                        <form action="{{route('tuyendung.destroy',$hire->id)}}"
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" style="width: 90px"
                                                       onclick="return confirm('bạn có thực sự muốn xóa')"
                                                       class="btn bg-danger text-dark"
                                            value="Xóa">
                                          
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

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
