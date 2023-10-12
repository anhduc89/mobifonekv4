@extends('layouts.admin')

@section('title')
    <title>Về chúng tôi</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('asset/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Thông tin',
            'key' => 'Về chúng tôi',
            'link' => 'infoCompany.aboutus',
        ])
        <!-- Main content -->
        <div class="col-12">

        </div>
        <form action="<?php if(empty($aboutUs)){?>{{ route('infoCompany.addAboutUs') }}<?php } else {?>{{ route('infoCompany.updateAboutUs', ['id' => $aboutUs['id'] ]) }}<?php } ?>" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Về chúng tôi</h3>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ckeditor_form  @error('contents') is-invalid @enderror" name="content" id="contents"
                                            cols="30" rows="15"><?php if(!empty($aboutUs)) { echo $aboutUs['content']; }?></textarea>
                                    </div>
                                    @error('content')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Hình ảnh bài viết</label>
                                        <input type="file" class="form-control-file" name="image_path">
                                    </div>

                                    <?php if (!empty($aboutUs['photo_about'])) { ?>
                                        <img src=" {{ $aboutUs['image_path'] }} " class="image-list" style="margin-top:10px">
                                    <?php }  ?>

                                    @error('image_path')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />


                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-outline-info"><?php if (empty($aboutUs)) {
                                        echo 'Thêm mới';
                                    } else {
                                        echo 'Cập nhật';
                                    } ?></button>
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
