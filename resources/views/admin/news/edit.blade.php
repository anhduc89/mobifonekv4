<?php #echo "<pre>"; print_r($itemNews->tags); exit;?>

@extends('layouts.admin')

@section('title')
    <title>Cập nhật bài viết</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('asset/select2/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Bài viết',
            'key' => 'Cập nhật',
            'link' => 'news.index',
        ])
        <!-- Main content -->
        <form action="{{ route('news.updateNews',['id' => $itemNews->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Cập nhật bài viết</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tiêu đề bài viết</label>
                                        <input type="text" class="form-control" placeholder="Nhập tiêu đều bài viết"
                                            name="title" value="{{ $itemNews->title }}">
                                    </div>
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung ngắn</label>
                                        <textarea class="form-control ck-form" name="short_content" id="short_content" cols="30" rows="5">{{ $itemNews->short_content }}</textarea>
                                    </div>

                                    <hr width="100%" />
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ck-form" name="contents" id="contents" cols="30" rows="15">{{ $itemNews->content }}</textarea>
                                    </div>

                                    <hr width="100%" />
                                    <div class="form-group">
                                        <label>Hình ảnh bài viết</label>
                                        {{-- <input type="file" class="form-control-file" name="image_path"> --}}
                                        <input type="text" class="form-control" placeholder="Chọn ảnh"
                                            name="image_path" value="{{ $itemNews->image_path }}" id="image_path" onclick="openPopupImg2('image_path')"
                                            ondblclick="view('image_path')">

                                        <img src=" {{ $itemNews->image_path }} " class="image-list" style="margin-top:10px">
                                    </div>
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Danh mục bài viết</label>
                                        <select name="category_id" class="form-control">
                                            <?php
                                            foreach ($listCategory as $itemList) {
                                                if($itemList['id'] == $itemNews->category_id)
                                                {
                                                    echo '<option value=' . $itemList['id'] . ' selected> ' . $itemList['name'] . '</option>';
                                                }
                                                else {
                                                    echo '<option value=' . $itemList['id'] . '>' . $itemList['name'] . '</option>';
                                                }

                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <hr width="100%" />
                                    {{-- Bài viết có cho lên app không? Để mặc định là "có". --}}
                                    <div class="form-group">
                                        <label>Hiển thị lên app</label>
                                        <select name="show_app" class="form-control">
                                            <option value="1">Có</option>
                                            <option value="0">Không</option>
                                        </select>
                                    </div>

                                    <hr width="100%" />
                                    <div class="form-group">
                                        <label>Ẩn/hiện bài tin</label>
                                        <select name="status" class="form-control">
                                            <?php
                                                if($itemNews->status == 1) { echo '<option value="1"> Đang hiển thị</option>';}
                                                else if($itemNews->status == 0) {echo '<option value="0">Đang ẩn</option>';}
                                            ?>
                                            <option value="1"> -- Hiển thị bài viết</option>
                                            <option value="0"> -- Ẩn bài viết</option>
                                        </select>
                                    </div>

                                    <hr width="100%" />
                                    <div class="form-group">
                                        <label>Bài viết nổi bật</label>
                                        <select name="highlight" class="form-control">
                                            <?php
                                                if($itemNews->highlight == 1) { echo '<option value="1"> Bài viết nổi bật </option>
                                                                                    <option value="0"> -- Không phải bài viết nổi bật </option>';}

                                                else if($itemNews->highlight == 0) {echo '<option value="0">Không phải bài viết nổi bật </option>
                                                                                    <option value="1"> -- Bài viết nổi bật </option>';}
                                            ?>
                                        </select>
                                    </div>


                                    <hr width="100%" />
                                    <div class="form-group">
                                        <label>Ngày đăng bài</label>
                                        <input type="text" id='datepicker'
                                            class="form-control datepicker @error('application_deadline') is-invalid @enderror"
                                            placeholder="Nhập thời hạn" name="date"
                                            value="{{ date('d-m-Y', strtotime($itemNews->date)) }}">
                                    </div>

                                    </hr/>
                                    <div class="form-group">
                                        <label>Tags bài viết</label>
                                        <select class="form-control tag-news" multiple="multiple" name="tags[]">
                                            @foreach ($itemNews->tags as $item)
                                                <option value="{{ $item->name }}" selected>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#datepicker").datepicker({
                dateFormat: "dd-mm-yy",
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection
