@extends('layouts.admin')

@section('title')
    <title>Cập nhật sản phẩm - dịch vụ</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Bài viết sản phẩm - dịch vụ',
            'key' => 'Cập nhật',
            'link' => 'products.index',
        ])
        <!-- Main content -->
        <div class="col-12">

        </div>
        <form action="{{ route('products.updateProduct', ['id' => $dataProduct->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Chỉnh sửa sản phẩm - dịch vụ {{ $dataProduct->name }}</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên sản phẩm - dịch vụ</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm - dịch vụ"
                                            name="name" value="{{ $dataProduct->name }}">
                                    </div>

                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ck-form  @error('short_content') is-invalid @enderror" name="short_content" id="short_content"
                                            cols="30" rows="15">{{ $dataProduct->short_content }}</textarea>
                                    </div>
                                    @error('short_content')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ck-form" name="contents" id="contents" cols="30" rows="15">{{ $dataProduct->contents }}</textarea>
                                    </div>
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Hình ảnh bài viết</label>
                                        <input type="file"
                                            class="form-control-file @error('image_path') is-invalid @enderror"
                                            name="image_path">

                                        <img src="{{ $dataProduct->image_path }}" class="image-list"
                                            style="margin-top:10px">
                                    </div>

                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Danh mục sản phẩm - dịch vụ</label>
                                        <select name="product_categories" class="form-control">
                                            <?php
                                            foreach ($categories as $itemList) {
                                                if ($itemList['id'] == $dataProduct->product_categories) {
                                                    echo '<option value=' . $itemList['id'] . ' selected> ' . $itemList['name'] . '</option>';
                                                } else {
                                                    echo '<option value=' . $itemList['id'] . '>' . $itemList['name'] . '</option>';
                                                }
                                            }
                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sản phẩm - dịch vụ nổi bật</label>
                                        <select name="highlight" class="form-control">
                                                <?php
                                                    if($dataProduct->highlight == 1) { echo '<option value="1">Có</option>'; }
                                                    else {echo '<option value="0">Không</option>'; }
                                                ?>
                                                <option value="1">Có</option>
                                                <option value="0">Không</option>
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
                                    <button type="submit" class="btn btn-block btn-outline-info">Cập nhật</button>
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
