@extends('layouts.admin')

@section('title')
    <title>Cập nhật bài viết</title>
@endsection

@section('css-custom-admin')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Tin tuyển dụng',
            'key' => 'Cập nhật',
            'link' => 'recruitment.index',
        ])
        <!-- Main content -->
        <form action="{{ route('recruitment.updateRecruitment', ['id' => $dataUpdate->id]) }}" method="POST"
            enctype="multipart/form-data">
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
                                        <label>Tiêu đề bài tuyển dụng</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Nhập tiêu đều bài viết" name="title"
                                            value="{{ $dataUpdate->title }}">
                                    </div>
                                    @error('title')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ckeditor_form  @error('contents') is-invalid @enderror" name="contents" id="contents"
                                            cols="30" rows="15">{{ $dataUpdate->contents }}</textarea>
                                    </div>
                                    @error('contents')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Hình ảnh đại diện bài viết</label>
                                        <input type="file" class="form-control-file" name="image_path">

                                        <img src="{{ $dataUpdate->image_path }}" class="image-list" style="margin-top:10px">
                                    </div>

                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Thời hạn tuyển dụng</label>
                                        <input type="text" id='datepicker'
                                            class="form-control datepicker @error('application_deadline') is-invalid @enderror"
                                            placeholder="Nhập thời hạn" name="application_deadline"
                                            value="{{ date('d-m-Y', strtotime($dataUpdate->application_deadline)) }}">
                                    </div>
                                    @error('application_deadline')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Số lượng ứng viên</label>
                                        <input type="number"
                                            class="form-control @error('number_of_applicants') is-invalid @enderror"
                                            placeholder="Nhập số lượng ứng viên" name="number_of_applicants"
                                            value="{{ $dataUpdate->number_of_applicants }}">
                                    </div>
                                    @error('number_of_applicants')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status" id="" class="form-control">
                                            <?php
                                                if($dataUpdate->status == 1)
                                                {
                                                    echo '<option value="1" selected >Hiển thị bài viết </option>
                                                    <option value="0"> Ẩn bài viết </option>';
                                                }
                                                else
                                                {
                                                    echo '<option value="0" selected >Ẩn bài viết</option>
                                                    <option value="1"> Hiển thị bài viết </option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
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

@section('js-custom-admin')
    <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
    <script src="{{ asset('admins/recruitment/recruitment.js') }}"></script>
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
