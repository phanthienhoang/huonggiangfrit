@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Sản phẩm
                        <div class=" float-right">
                            <a href="{{ route('admin.new.create')}}" type="button" id="create_room_type"
                               class="btn btn-primary"><i class="fa fa-plus"></i>Thêm tin tức mới</a>
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
                            <h3 class="card-title">Danh sách tin tức</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-primary">
                                <tr>
                                    <th>Tên tin tức</th>
                                    <th>Loại tin tức</th>
                                    <th>Mô tả</th>
                                    <th>Ảnh</th>
                                    <th class="action">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($kq as $new_tran)
                                    <tr>
                                            <td style="max-width: 200px;">
                                                @if (empty($new_tran->name))
                                                    <li class="text-danger">dữ liệu trống</li>
                                                @else
                                                    <li class="text-truncate">{{$new_tran->name}}</li>
                                                @endif
                                            </td>
                                            <td style="max-width: 200px;">
                                                @foreach(\App\Category_new_tran::all() as $cate_new_tran)

                                                    @if($cate_new_tran->locale == $new_tran->locale && $cate_new_tran->category_id == \App\News::find($new_tran->new_id)->category_id )
                                                        @if(empty($cate_new_tran->name))
                                                            <li  class="text-danger">
                                                                dữ liệu trống
                                                            </li>
                                                        @else
                                                            <li style="max-width: 200px;">
                                                                {{$cate_new_tran->name}}
                                                            </li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <div>
                                                <td style="max-width: 200px;">
                                                    @if (empty($new_tran->description ))
                                                        <li class="text-danger">dữ liệu trống</li>
                                                    @else
                                                        <li class="text-truncate">{{$new_tran->description }} </li>
                                                    @endif
                                                </td>
                                            </div>
                                            <td>
                                                @if (empty($new_tran->image))
                                                @else
                                                    <img src="{{$new_tran->image}}"
                                                         alt="sim_image"
                                                         style="width: 150px; height: 150px">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-inline-block">
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-warning dropdown-toggle"
                                                                style="width: 90px" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"><i class="fa fa-edit"></i>
                                                        </button>
                                                        <div class="dropdown-menu bg-warning" style="width: 90px"
                                                             aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                               href="{{ route('admin.new.edit',$new_tran->id) }}">Vi</a>
                                                            <a class="dropdown-item"
                                                               href="{{ route('admin.new.edit', ($new_tran->id)+1 )}}">Eng</a>
                                                        </div>
                                                    </div>
                                                    <form action="{{route('admin.new.destroy',$new_tran->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" style="width: 90px"
                                                               onclick="return confirm('bạn có thực sự muốn xóa')"
                                                               class="btn bg-danger text-dark"
                                                               value="Xóa">
                                                    </form>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-info dropdown-toggle"
                                                                style="width: 90px" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false">Chi tiết
                                                        </button>
                                                        <div class="dropdown-menu bg-info" style="width: 90px"
                                                             aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item"
                                                               href="{{ route('admin.new.show',$new_tran->id) }}">Vi</a>
                                                            <a class="dropdown-item"
                                                               href="{{ route('admin.new.show', ($new_tran->id)+1 )}}">Eng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('style')

    <link rel="stylesheet" href="/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

@endpush

@push('script')
    <script src="/backend/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "columnDefs": [{
                    "targets": 'action',
                    "orderable": false,
                }]
            });
        });
    </script>
@endpush
