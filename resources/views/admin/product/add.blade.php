{{-- import {CKFinder} from '@ckeditor/ckeditor5-ckfinder'; --}}
@extends('layouts.admin')

@section('title')
    <title>Thêm mới sản phẩm - dịch vụ</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Bài viết sản phẩm - dịch vụ',
            'key' => 'Thêm mới',
            'link' => 'products.index',
        ])
        <!-- Main content -->
        <div class="col-12">

        </div>
        <form action="{{ route('products.addProduct') }}" method="POST" enctype="multipart/form-data">
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
                                            placeholder="Nhập tên sản phẩm - dịch vụ" name="name" value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ckeditor_form  @error('contents') is-invalid @enderror" name="contents" id="contents"
                                            cols="30" rows="15">{{ old('contents') }}</textarea>
                                    </div>
                                    @error('contents')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Hình ảnh bài viết</label>
                                        <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path">
                                    </div>
                                    @error('image_path')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Danh mục sản phẩm - dịch vụ</label>
                                        <select name="product_categories" class="form-control">
                                            <?php
                                            foreach ($categories as $item) {
                                                echo '<option value=' . $item['id'] . '>' . $item['name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    {{-- Bài viết có cho lên app không? Để mặc định là "có". --}}
                                    {{-- <div class="form-group">
                                        <label>Hiển thị lên app</label>
                                        <select name="show_app" class="form-control">
                                            <option value="1">Có</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div> --}}

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

{{-- <script>
    CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('uploadPhoto').'?_token='.csrf_token() !!}';
</script> --}}
@section('js-custom-admin')
    <script src="{{ asset('asset/select2/select2.min.js') }}"></script>
    <script src="{{ asset('asset/ckeditor/build/ckeditor.js') }}"></script>
    <script src="{{ asset('asset/ckfinder/ckfinder.js') }}"></script>
    <script src="{{ asset('asset/custom_ckeditor.js') }}"></script>
    <script src="{{ asset('admins/news/news.js') }}"></script>

@endsection
