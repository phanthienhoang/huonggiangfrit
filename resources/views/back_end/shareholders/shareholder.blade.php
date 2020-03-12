@extends('back_end.layouts.app')
@section('title', 'Quan hệ cổ đông')

@push('style')
<link rel="stylesheet" href="/plugins/bootstrap-toggle/css/bootstrap2-toggle.min.css">
<link rel="stylesheet" href="/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css">


@endpush
@section('content_header')

<div class="content-header">
    <div class="container-fluid">
        <h2>Quan hệ cổ đông
        </h2>
    </div>
</div>

@endsection

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="hotel" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($shareholders as $shareholder)
                                <td>{{ $shareholder->getTranslation('vi')->title}}</td>
                                <td>{{ $shareholder->getTranslation('vi')->content}}</td>
                                @endforeach

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

</section>


@endsection

@push('script')

@endpush