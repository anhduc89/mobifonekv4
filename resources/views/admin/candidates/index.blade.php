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
            'name' => 'Ứng viên ',
            'key' => 'Danh sách',
            'link' => 'candidates.index',
        ])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách ứng viên chưa xét duyệt</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>Vị trí ứng tuyển</th>
                                            <th>Ngày gửi CV</th>
                                            <th>CV</th>
                                            <th>Trạng thái</th>
                                            <th>Comment</th>

                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1; ?>
                                        @foreach ($list_candidates as $item)

                                                <tr>
                                                    <th>{{ $stt }}</th>
                                                    <td> <p class="text-news">{{ $item->name }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->number_phone }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->email }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->title }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->created_at }}</p> </td>
                                                    <td>  <a href="/{{ $item->files }}" target="_blank">Xem CV</a></td>
                                                    <form action="{{ route('candidates.updateCandidates', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <td>
                                                        <select name="status" id="status_{{ $item->id }}" class="form-control">
                                                            <option value="0"> Đang chờ duyệt hồ sơ </option>
                                                            <option value="1"> Được nhận </option>
                                                            <option value="2"> Loại </option>
                                                        </select>
                                                    </td>
                                                    <td> <textarea name="comment" id="comment_{{ $item->id }}" cols="30" rows="1" class="form-control"></textarea> </td>
                                                    <td> <button type="submit" class="btn btn-outline-success btn-sm">Cập nhật</button> </td>
                                                    </form>
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
                        {!! $list_candidates->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

        {{-- Ứng viên bị loại --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách ứng viên bị loại</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>SĐT</th>
                                            <th>Email</th>
                                            <th>Vị trí ứng tuyển</th>
                                            <th>Ngày gửi CV</th>
                                            {{-- <th>Trạng thái</th> --}}
                                            <th>Comment</th>
                                            {{-- <th>Hành động</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1; ?>
                                        @foreach ($list_candidates_out as $item)

                                                <tr>
                                                    <th>{{ $stt }}</th>
                                                    <td> <p class="text-news">{{ $item->name }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->number_phone }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->email }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->title }}</p> </td>
                                                    <td> <p class="text-news">{{ $item->created_at }}</p> </td>

                                                    <form action="{{ route('candidates.updateCandidates', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- <td>
                                                        <select name="status" id="status_{{ $item->id }}" class="form-control">
                                                            <option value="0"> Đang chờ duyệt hồ sơ </option>
                                                            <option value="1"> Được nhận </option>
                                                            <option value="2"> Loại </option>
                                                        </select>
                                                    </td> --}}
                                                    <td>
                                                        {{ $item->comment }}
                                                    </td>
                                                    {{-- <td> <button type="submit" class="btn btn-outline-success btn-sm">Cập nhật</button> </td> --}}
                                                    </form>
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
                        {!! $list_candidates->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
