@extends('layouts.admin')

@section('title')
    <title>Tuyển dụng</title>
@endsection

@section('css-custom-admin')
    <link rel="stylesheet" href="{{ asset('admins/news/news.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Tuyển dụng',
            'key' => 'Danh sách',
            'link' => 'recruitment.index',
        ])


        {{-- Hiển thị những bài viết đang onl trên website người dùng  --}}
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('recruitment.create') }}" class="btn btn-block btn-outline-success btn-admin-custom"> Thêm
                            mới </a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bài viết đang hiển thị</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th width="400px">Tiêu đề</th>
                                            <th>Thời hạn nộp hồ sơ</th>
                                            <th>Trạng thái bài viết</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1;?>
                                        @foreach ($listRecruimentOn as $item)
                                         <?php if($item->status == 1) {
                                                    $trangthai = 'Hiển thị bài viết';
                                                }
                                                else if($item->status == 0)
                                                {
                                                    $trangthai = 'Đang ẩn bài viết';
                                                }
                                         ?>
                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td><p class="text-news" >{{ $item->title }}</p></td>
                                                <td><p class="text-news" >{{ date('d/m/Y',strtotime($item->application_deadline)) }}</p></td>
                                                <td>
                                                    <p class="text-news"> {{ $trangthai }} </p>
                                                </td>
                                                {{-- <td><p class="text-news"> {{ optional($item->categoriesNews)->name }} </p></td>
                                                <td><p class="text-news"> {{ date( "d/m/Y", strtotime($item->date))  }} </p></td> --}}

                                                <td>
                                                    <a href="{{ route('recruitment.edit',['id' => $item->id]) }}"><button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button></a>

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
                        {!! $listRecruimentOn->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

        {{-- Hiển thị những bài viết đang off trên website người dùng  --}}
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Bài viết đang ẩn</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th width="400px">Tiêu đề</th>
                                            <th>Thời hạn nộp hồ sơ</th>
                                            <th>Trạng thái bài viết</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1;?>
                                        @foreach ($listRecruimentOff as $item)
                                         <?php if($item->status == 1) {
                                                    $trangthai = 'Hiển thị bài viết';
                                                }
                                                else if($item->status == 0)
                                                {
                                                    $trangthai = 'Đang ẩn bài viết';
                                                }
                                         ?>
                                            <tr>
                                                <th>{{ $stt }}</th>
                                                <td><p class="text-news" >{{ $item->title }}</p></td>
                                                <td><p class="text-news" >{{ date('d/m/Y',strtotime($item->application_deadline)) }}</p></td>
                                                <td>
                                                    <p class="text-news"> {{ $trangthai }} </p>
                                                </td>
                                                <td>
                                                    <a href="{{ route('recruitment.edit',['id' => $item->id]) }}"><button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button></a>
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
                        {!! $listRecruimentOff->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

    </div>
@endsection
