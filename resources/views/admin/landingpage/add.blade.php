@extends('layouts.admin')

@section('title')
    <title>Thêm mới bài viết</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('asset/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Sản phẩm - dịch vụ',
            'key' => 'Thêm mới',
            'link' => 'landingpage.index',
        ])
        <!-- Main content -->
        <form action="{{ route('news.addNews') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Thêm mới sản phẩm - dịch vụ</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên sản phẩm - dịch vụ</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nhập tên sản phẩm - dịch vụ" name="title">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ck-form @error('contents') is-invalid @enderror" name="content" id="content"
                                            cols="30" rows="15"></textarea>
                                    </div>
                                    @error('content')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Ưu điểm sản phẩm - dịch vụ</label>
                                        <textarea class="form-control ck-form" name="advantage" id="advantage" cols="30" rows="10"></textarea>
                                    </div>
                                    @error('advantage')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Tính năng sản phẩm - dịch vụ</label>
                                        <textarea class="form-control ck-form" name="feature" id="feature" cols="30" rows="10"></textarea>
                                    </div>
                                    @error('feature')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />


                                    <div class="form-group">
                                        <label>Hình ảnh bài viết</label>
                                        <input type="file" class="form-control-file" name="avatar_path">
                                    </div>
                                    <hr width="100%" />

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
    <script src="{{ asset('asset/select2/select2.min.js') }}"></script>
    <script src="{{ asset('asset/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ asset('asset/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('asset/custom_ckeditor.js') }}"></script>
    <script src="{{ asset('admins/news/news.js') }}"></script>
@endsection
