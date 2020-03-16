@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Sản phẩm
                    <div class=" float-right">
                        <a href="{{ route('admin.category-products.create')}}" type="button" id="create_room_type"
                            class="btn btn-primary"><i class="fa fa-plus"></i>Thêm sản phẩm mới</a>
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
                                @foreach($categoryProducts ?? '' as $categoryProduct)
                                <tr>
                                    <td><?= $categoryProduct['name'] ?></td>
                                    <td><img src='<?=$categoryProduct['images']?>' width=100px height=100px /></td>
                                    <td><?= $categoryProduct['description'] ?></td>
                                    <!-- <td><div><?= $categoryProduct['contents']?></div></td> -->
                                    <!-- <td><?= $categoryProduct['locale'] ?></td> -->
                                    <td>
                                        <div class="d-inline-block">
                                            <a href="{{ route('admin.category-products.show', $categoryProduct->id) }}"
                                                class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('admin.category-products.edit', $categoryProduct->id) }}"
                                                class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                            <form class="d-inline"
                                                action="{{route('admin.category-products.destroy',$categoryProduct->id)}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" onclick="return confirm('bạn có thực sự muốn xóa')"
                                                    class="btn bg-danger text-dark" value="Xóa&nbsp&nbsp&nbsp&nbsp"/>
                                            </form>
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