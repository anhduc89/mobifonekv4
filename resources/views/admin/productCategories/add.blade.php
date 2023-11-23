@extends('layouts.admin')

@section('title')
    <title>Thêm mới danh mục sản phẩm - dịch vụ</title>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Danh mục sản phẩm - dịch vụ', 'key' => 'Thêm mới', 'link' => 'productCategories.index'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Thêm mới danh mục sản phẩm - dịch vụ</h3>
                            </div>

                            <form action="{{ route('productCategories.addProductCategories') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn danh mục cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">Chọn danh mục cha</option>
                                            {!! $categoryParent !!}
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
