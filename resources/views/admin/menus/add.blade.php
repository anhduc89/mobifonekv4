@extends('layouts.admin')

@section('title')
    <title>Thêm mới danh mục</title>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Menus',
            'key' => 'Thêm mới',
            'link' => 'menus.index',
        ])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Thêm mới menus</h3>
                            </div>

                            <form action="{{ route('menus.addMenu') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên menu</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên menu" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn menu cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">Chọn danh mục cha</option>
                                            {!! $menuParent !!}
                                        </select>
                                    </div>
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
