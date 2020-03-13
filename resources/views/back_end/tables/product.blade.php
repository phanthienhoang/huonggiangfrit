@extends('back_end.layouts.app')
@section('title', 'Form')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Sản phẩm
                    <div class=" float-right">
                        <a href="{{ route('admin.products.create')}}" type="button" id="create_room_type"
                            class="btn btn-primary"><i class="fa fa-plus"></i>Thêm sản phẩm mới</a>
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
                                    <th>Tên sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Ảnh</th>
                                    <th class="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Product::all() as $product)
                                <tr>
                                    <td> @foreach ($product->productTranslates as $item)
                                        @if (empty($item->name))
                                        @else
                                        <li>{{$item->name}}</li>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>Loại 1</td>
                                    <div>
                                        <td style="max-width: 200px;">
                                            @foreach ($product->productTranslates as $item)
                                            @if (empty($item->description))
                                            @else
                                            <li class="text-truncate">{{$item->description}}</li>
                                            @endif
                                            @endforeach
                                        </td>
                                    </div>
                                    <td>
                                        @foreach ($product->productTranslates as $item)
                                        @if (empty($item->image))
                                        @else
                                        <li>{{$item->image}}</li>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-inline-block">
                                            <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-warning dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><i class="fa fa-edit"></i>
                                                </button>
                                                <div class="dropdown-menu bg-warning"
                                                    aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.products.edit', $product->translation('en')->first()->id) }}">Eng</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.products.edit', $product->translation('vi')->first()->id) }}">Vi</a>
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