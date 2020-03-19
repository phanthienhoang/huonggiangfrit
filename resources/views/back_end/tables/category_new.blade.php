@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark"> Loại tin tức
                        <div class=" float-right">
                            <a href="{{ route('admin.category_new.create')}}" type="button" id="create_room_type"
                               class="btn btn-primary"><i class="fa fa-plus"></i>Thêm loại Tin tức mới</a>
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
                            <h3 class="card-title">Danh sách loại tin tức</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên loại tin tức</th>

                                    <th class="action text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kq as $category_new_tran)
                                    <tr>
                                        <td>{{$category_new_tran->id}}</td>
                                        @if(empty($category_new_tran->name))
                                            <td><p class="text-danger">dữ liệu trống</p></td>
                                        @else
                                            <td>{{$category_new_tran->name}}</td>
                                        @endif
                                        <td>
                                            <div class="btn-group-vertical">
                                                <div class="dropdown d-inline-block ">
                                                    <button class="btn btn-warning dropdown-toggle"
                                                            style="width: 90px" type="button"
                                                            id="dropdownMenuButton" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false"><i class="fa fa-edit"></i>
                                                    </button>
                                                    <div class="dropdown-menu bg-warning"
                                                         aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"
                                                           href="{{ route('admin.category_new.edit',$category_new_tran->id) }}">Vi</a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('admin.category_new.edit', $category_new_tran->id +1)}}">Eng</a>
                                                    </div>
                                                </div>
                                                <form
                                                    action="{{route('admin.category_new.destroy',$category_new_tran->id)}}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" style="width: 90px"
                                                           onclick="return confirm('bạn có thực sự muốn xóa')"
                                                           class="btn bg-danger text-dark"
                                                           value="Xóa">
                                                </form>

                                                <a href="{{ route('admin.category_new.show',$category_new_tran->id) }}" style="width: 90px" class="btn bg-info">chi tiết</a>

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
