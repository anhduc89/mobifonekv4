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
            'name' => 'Hình ảnh slide',
            'key' => 'Danh sách',
            'link' => 'image.index',
        ])


        <!-- Hình ảnh đang hiển thị ngoài website -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('image.create') }}" class="btn btn-block btn-outline-success btn-admin-custom"> Thêm
                            mới </a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hình ảnh đang hiển thị</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th width="400px">Tên ảnh</th>
                                            <th>Hình ảnh</th>
                                            <th>Phân loại</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1;?>
                                        @foreach ($listImage as $item)
                                            <?php
                                                if ($item->type == '1') { $type = 'Slider'; }
                                                elseif ($item->type == '2') { $type = 'Gallery'; };
                                            ?>

                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td><p class="text-news" >{{ $item->name }}</p></td>
                                                <td>
                                                    <img src="{{ $item->path }}" class="image-list">
                                                </td>
                                                <td>
                                                    {{ $type }}
                                                </td>

                                                <td>
                                                    <a href="{{ route('image.edit',['id' => $item->id]) }}"><button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button></a>
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
                        {!! $listImage->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->


        <!-- Hình ảnh đang ẩn -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Hình ảnh đang ẩn</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th width="400px">Tên ảnh</th>
                                            <th>Hình ảnh</th>
                                            <th>Phân loại</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1;?>
                                        @foreach ($listImageOff as $item)
                                            <?php
                                                if ($item->type == '1') { $type = 'Slider'; }
                                                elseif ($item->type == '2') { $type = 'Gallery'; };
                                            ?>

                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td><p class="text-news" >{{ $item->name }}</p></td>
                                                <td>
                                                    <img src="{{ $item->path }}" class="image-list">
                                                </td>
                                                <td>
                                                    {{ $type }}
                                                </td>

                                                <td>
                                                    <a href="{{ route('image.edit',['id' => $item->id]) }}"><button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button></a>
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
                        {!! $listImageOff->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
