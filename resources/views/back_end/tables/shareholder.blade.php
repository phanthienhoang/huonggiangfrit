@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Tin tức
                        <div class=" float-right">
                            <a href="{{ route('admin.shareholder.create')}}" type="button" id="create_room_type"
                               class="btn btn-primary"><i class="fa fa-plus"></i>Thêm Tin tức mới</a>
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
                            <h3 class="card-title">Danh sách loại tin tức cổ đông</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-primary">
                                <tr>
                                    <th>Title</th>
                                    <th>images</th>
                                    <th>contents</th>
                                    <th>status</th>
                                    <th>locale</th>
                                    <th class="action text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($atributes as $atribute)
                                    <tr>
                                        <td>{{$atribute->title}}</td>
                                        <td>{{$atribute->images}}</td>
                                        <td>{{$atribute->contents}}</td>
                                        <td>{{$atribute->status}}</td>
                                        <td>{{$atribute->locale}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{route('admin.shareholder.edit', $atribute->id)}}"
                                                       class="btn bg-warning">Sửa</a>
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="{{route('admin.shareholder.destroy',$atribute->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" onclick="return confirm('bạn có thực sự muốn xóa')" class="btn bg-danger text-dark"
                                                               value="Xóa">
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('admin.shareholder.show',$atribute->id)}}" class="btn bg-info">chi tiết</a>
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
