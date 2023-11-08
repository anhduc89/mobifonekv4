@extends('layouts.admin')

@section('title')
    <title>Thêm mới ảnh slide</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('asset/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Slide',
            'key' => 'Thêm mới',
            'link' => 'image.index',
        ])
        <!-- Main content -->

        <form action="{{ route('image.addImage') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Thêm mới ảnh slide</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên ảnh</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nhập tên ảnh" name="name">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror

                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Chọn ảnh</label>
                                        {{-- <input type="file" class="form-control-file" name="path" @error('path') is-invalid @enderror> --}}
                                        <input type="text" class="form-control" placeholder="Chọn ảnh"
                                            name="path" value="" id="image_slide" onclick="openPopupImg2('image_slide')"
                                            ondblclick="view('dxnv')">
                                    </div>
                                    @error('path')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Phân loại</label>
                                        <select name="type" class="form-control">
                                            <option value="1" selected> Ảnh slide </option>
                                            <option value="2"> Ảnh gallery </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-outline-info">Thêm mới</button>
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
    <script src="{{ asset('asset/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ asset('asset/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('asset/custom_ckeditor.js') }}"></script>
    <script>
        function openPopupImg2(id) {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    console.log(evt.data.files);

                    document.getElementById(id).value = file.getUrl();

                });
                finder.on('file:choose:resizedImage', function(evt) {
                    document.getElementById(id).value = evt.data.resizedUrl;
                });
            }
        });
    }
    </script>
@endsection


