@extends('layouts.admin')

@section('title')
    <title>Trang quản trị</title>
@endsection

@section('css-custom-admin')
    <link rel="stylesheet" href="{{ asset('admins/news/news.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Sản phẩm - dịch vụ',
            'key' => 'Danh sách',
            'link' => 'products.index',
        ])


        <!-- Main content -- Sản phẩm đang hoạt động -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('products.create') }}" class="btn btn-block btn-outline-success btn-admin-custom"> Thêm
                            mới </a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sản phẩm đang hoạt động</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th width="400px">Tiêu đề</th>
                                            <th>Ảnh sản phẩm - dịch vụ</th>
                                            <th>Chuyên mục</th>
                                            <th>Sản phẩm - dịch vụ nổi bật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1; ?>
                                        @foreach ($products as $item)
                                            <?php
                                                if($item->highlight == '1') {
                                                    $highlight = '<td><p class="text-news"> Có </p></td>';
                                                }
                                                else if($item->highlight == '0'){
                                                    $highlight = '<td><p class="text-news"> Không </p></td>';
                                                }
                                            ?>
                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td><p class="text-news" >{{ $item->name }}</p></td>
                                                <td>
                                                    <img src="{{ $item->image_path }}" class="image-list">
                                                </td>

                                                <td><p class="text-news"> {{ optional($item->categoriesProduct)->name }} </p></td>
                                                <?php echo $highlight; ?>

                                                <td>
                                                    <a href="{{ route('products.edit',['id' => $item->id]) }}"><button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button></a>
                                                    <button type="button" class="btn btn-outline-warning btn-sm">Xóa</button>
                                                </td>
                                            </tr>
                                            <?php $stt++; ?>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-12">
                        {{-- một trong 2 cách --}}
                        {{-- {{ $categories->links('pagination::bootstrap-4') }} --}}
                        {!! $products->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

        <!-- Main content -- Sản phẩm đã dừng -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sản phẩm đang ẩn</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th width="400px">Tiêu đề</th>
                                            <th>Ảnh sản phẩm - dịch vụ</th>
                                            <th>Chuyên mục</th>
                                            <th>Sản phẩm - dịch vụ nổi bật</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1; ?>
                                        @foreach ($productsHidden as $item)
                                            <?php
                                                if($item->highlight == '1') {
                                                    $highlight = '<td><p class="text-news"> Có </p></td>';
                                                }
                                                else if($item->highlight == '0'){
                                                    $highlight = '<td><p class="text-news"> Không </p></td>';
                                                }
                                            ?>
                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td><p class="text-news" >{{ $item->name }}</p></td>
                                                <td>
                                                    <img src="{{ $item->image_path }}" class="image-list">
                                                </td>

                                                <td><p class="text-news"> {{ optional($item->categoriesProduct)->name }} </p></td>
                                                <?php echo $highlight; ?>

                                                <td>
                                                    <a href="{{ route('products.edit',['id' => $item->id]) }}"><button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button></a>
                                                    <button type="button" class="btn btn-outline-warning btn-sm">Xóa</button>
                                                </td>
                                            </tr>
                                            <?php $stt++; ?>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-12">
                        {{-- một trong 2 cách --}}
                        {{-- {{ $categories->links('pagination::bootstrap-4') }} --}}
                        {!! $products->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

    </div>
@endsection
