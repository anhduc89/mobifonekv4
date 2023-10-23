@extends('layouts.admin')

@section('title')
    <title>Chi nhánh</title>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Chi nhánh',
            'key' => 'Thêm mới',
            'link' => 'infoCompany.branch',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Thêm chi nhánh</h3>
                            </div>

                            <form action="{{ route('infoCompany.addBranch') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên chi nhánh</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên chi nhánh" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address">
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" placeholder="Nhập số điện thoại liên hệ" name="phone">
                                    </div> --}}

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-outline-success">Thêm mới</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

    </div>
@endsection
