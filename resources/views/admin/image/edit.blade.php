@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa ảnh slide</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('asset/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Hình ảnh slide',
            'key' => 'Chỉnh sửa',
            'link' => 'image.index',
        ])
        <!-- Main content -->

        <form action="{{ route('image.updateImage',['id' => $itemImage->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Chỉnh sửa ảnh slide</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên ảnh</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nhập tên ảnh" name="name" value="{{ $itemImage->name }}">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror

                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Chọn ảnh</label>
                                        <input type="file" class="form-control-file" name="path"
                                            @error('path') is-invalid @enderror>
                                        <img src=" {{ $itemImage->path }} " class="image-list" style="margin-top:10px">
                                    </div>
                                    @error('path')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Phân loại</label>
                                        <select name="type" class="form-control">
                                            <option value="{{ $itemImage->type }}" selected >
                                                <?php if($itemImage->type == 1) {echo 'Slider';}
                                                        else if($itemImage->type == 2) { echo 'Gallery'; }?>
                                            </option>
                                            <option value="1"> Slider </option>
                                            <option value="2"> Gallery </option>
                                        </select>
                                    </div>

                                    <hr width="100%" />
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control">
                                            <option value="1" selected> Hiển thị hình ảnh </option>
                                            <option value="0"> Ẩn hình ảnh </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-outline-danger">Cập nhật</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.content -->

    </div>
@endsection

@section('js-custom-admin')
@endsection
