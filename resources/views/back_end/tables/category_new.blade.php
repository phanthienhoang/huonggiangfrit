@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Tin tức
                        <div class=" float-right">
                            <a href="{{ route('admin.category_new.create')}}" type="button" id="create_room_type"
                               class="btn btn-primary"><i class="fa fa-plus"></i>Thêm Tin tức mới</a>
                        </div>
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
@if(Session::has('create-success'))
    <h1><div id='banner_session' style="text-align:center" class="text-primary">{{ Session::get('create-success')}}</div></h1>
@endif  
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
                                    <th>ID</th>
                                    <th>Tên loại tin tức</th>
                                    <th>online</th>
                                    <th class="action text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category_news as $category_new)
                                    <tr>
                                        <td>{{$category_new->id}}</td>
                                        <td>{{$category_new->name}}</td>
                                        <td>{{$category_new->online}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{route('admin.category_new.edit', $category_new->id)}}"
                                                       class="btn bg-warning">Sửa</a>
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="{{route('admin.category_new.destroy',$category_new->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" onclick="return confirm('bạn có thực sự muốn xóa')" class="btn bg-danger text-dark"
                                                               value="Xóa">
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <a href="#" class="btn bg-info">chi tiết</a>
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
        setTimeout(() => {
            document.getElementById('banner_session').style.display = 'none';  
        }, 4000);
    </script>
@endpush
