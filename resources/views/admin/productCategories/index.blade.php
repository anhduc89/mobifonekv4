@extends('layouts.admin')

@section('title')
    <title>Trang quản trị</title>
@endsection


@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Danh mục sản phẩm - dịch vụ',
            'key' => 'Danh sách',
            'link' => 'productCategories.index',
        ])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('productCategories.create') }}"
                            class="btn btn-block btn-outline-success btn-admin-custom"> Thêm mới </a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên danh mục</th>
                                            <th>Danh mục cha</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt= 1;?>
                                        @foreach ($dataProductCategory as $item)
                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td>{{ $item->name }}</td>

                                                    @if($item->parent_id == 0) <td> -- </td>
                                                    @else
                                                        @foreach ($dataProductCategory as $itemParent)
                                                            @if($itemParent->id == $item->parent_id)  <td>{{ $itemParent->name }}</td>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                <td>
                                                    <button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button>
                                                    <button type="button" class="btn btn-outline-warning btn-sm">Xóa</button>
                                                </td>
                                            </tr>
                                            <?php $stt ++;?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

    </div>
@endsection
