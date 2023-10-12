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
            'name' => 'Bài viết',
            'key' => 'Thêm mới',
            'link' => 'news.index',
        ])
        <!-- Main content -->
        <div class="col-12">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
        <form action="{{ route('news.addNews') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Thêm mới bài viết</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tiêu đề bài viết</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Nhập tiêu đều bài viết" name="title">
                                    </div>
                                    @error('title')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung ngắn</label>
                                        <textarea class="form-control ck-form" name="short_content" id="short_content" cols="30" rows="5"></textarea>
                                    </div>
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ck-form  @error('contents') is-invalid @enderror" name="contents" id="contents"
                                            cols="30" rows="15"></textarea>
                                    </div>
                                    @error('contents')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Hình ảnh bài viết</label>
                                        <input type="file" class="form-control-file" name="image_path">
                                    </div>
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Danh mục bài viết</label>
                                        <select name="category_id" class="form-control">
                                            <?php
                                            foreach ($listCategory as $item) {
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
                                    <div class="form-group">
                                        <label>Tags bài viết</label>
                                        <select class="form-control tag-news" multiple="multiple" name="tags[]">

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
