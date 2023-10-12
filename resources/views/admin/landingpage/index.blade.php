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
            'name' => 'Landing Page',
            'key' => 'Danh sách',
            'link' => 'landingpage.index',
        ])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('landingpage.create') }}" class="btn btn-block btn-outline-success btn-admin-custom"> Thêm mới </a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách sản phẩm - dịch vụ</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th width="400px">Sản phẩm / dịch vụ</th>
                                            <th>Hình ảnh</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1;?>
                                        @foreach ($listLDP as $item)
                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td><p class="text-news" >{{ $item->name }}</p></td>
                                                <td>
                                                    <img src="{{ $item->avatar_path }}" class="image-list">
                                                </td>

                                                {{-- categoriesNews ở model News. Quan hệ 1 - n . 1 danh mục có nhiều bài  --}}
                                                {{-- <td><p class="text-news"> {{ optional($item->categoriesNews)->name }} </p></td>
                                                <td><p class="text-news"> {{ date( "d/m/Y", strtotime($item->date))  }} </p></td> --}}

                                                <td>
                                                    <a href="{{ route('landingpage.edit',['id' => $item->id]) }}"><button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button></a>

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
                        {!! $listLDP->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

    </div>
@endsection
