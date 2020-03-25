@extends('back_end.layouts.app')
@section('title', 'Form')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">

    <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead class="bg-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên loại tin tức tiếng Viêt</th>
                                    <th>Tên loại tin tức tiếng Anh</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$category_new_tran->id}}</td>
                                    @if(empty($category_new_tran->name))
                                        <td><p class="text-danger">dữ liệu trống</p></td>
                                    @else
                                        <td>{{$category_new_tran->name}}</td>
                                    @endif

                                    @if(empty($category_new_tran_en->name))
                                        <td><p class="text-danger">dữ liệu trống</p></td>
                                    @else
                                        <td>{{$category_new_tran_en->name}}</td>
                                    @endif

                                </tr>

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
