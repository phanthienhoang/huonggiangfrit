@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Sản phẩm
                    <div class=" float-right">
                        <a href="{{ route('admin.category.create')}}" type="button" id="create_room_type"
                            class="btn btn-primary"><i class="fa fa-plus"></i>Thêm sản phẩm mới</a>
                    </div>

                    <!-- <div class=" float-right">
                        <a href="{{ route('user.change-language',['en'])}}">English</a>
                    </div>

                    <div class=" float-right">
                        <a href="{{ route('user.change-language',['vi'])}}">Vietnam</a>
                    </div> -->

                    <div class="float-right">
                        <a href="{{ route('user.change-language',['en'])}}" ><img src='/assets/icon-en.png'/></a>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('user.change-language',['vi'])}}" ><img src='/assets/icon-vn.png'/></a>
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
                        <h3 class="card-title">Danh sách sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Loại sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>mô tả</th>
                                    <!-- <th>nội dung</th> -->
                                    <!-- <th>locale</th> -->
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kq as $key => $value)
                                    <tr>
                                        <td><?= $value['name'] ?></td>
                                        <td><img src='<?=$value['images']?>' width=100px  height=100px /></td>
                                        <td><?= $value['description'] ?></td>
                                        <!-- <td><div><?= $value['contents']?></div></td> -->
                                        <!-- <td><?= $value['locale'] ?></td> -->
                                        <td>
                                        <div class="row">
                                                <div class="col">
                                                    <a href="{{route('admin.category.edit', $value->id)}}"
                                                       class="btn bg-warning">Update</a>
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="#"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" onclick="return confirm('bạn có thực sự muốn xóa')" class="btn bg-danger text-dark"
                                                               value=" Delete&nbsp">
                                                    </form>
                                                </div>
                                                <div class="col">
                                                    <a  href="{{route('admin.category.show', $value->id)}}" class="btn bg-info">&nbspDetail&nbsp&nbsp</a>
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