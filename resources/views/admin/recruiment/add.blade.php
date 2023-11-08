@extends('layouts.admin')

@section('title')
    <title>Thêm mới bài viết</title>
@endsection

@section('css-custom-admin')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Tin tuyển dụng',
            'key' => 'Thêm mới',
            'link' => 'recruitment.index',
        ])
        <!-- Main content -->
        <form action="{{ route('recruitment.addRecruitment') }}" method="POST" enctype="multipart/form-data">
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
                                        <label>Tiêu đề bài tuyển dụng</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Nhập tiêu đề bài viết" name="title" value="{{ old('title') }}">
                                    </div>
                                    @error('title')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control ck-form  @error('contents') is-invalid @enderror" name="contents" id="contents"
                                            cols="30" rows="15">{{ old('contents') }}</textarea>
                                    </div>
                                    @error('contents')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Ngành nghề</label>
                                        <textarea class="form-control @error('nganhnghe') is-invalid @enderror" name="nganhnghe" id="nganhnghe"
                                            cols="10" rows="15">{{ old('nganhnghe') }}</textarea>
                                    </div>
                                    @error('nganhnghe')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror

                                    <hr width="100%" />
                                    <div class="form-group">
                                        <label>Hình ảnh đại diện bài viết</label>
                                        {{-- <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path"> --}}
                                        <input type="text" class="form-control" placeholder="Chọn ảnh"
                                            name="image_path" value="" id="image_path" onclick="openPopupImg2('image_path')" ondblclick="view('image_path')">
                                    </div>
                                    @error('image_path')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Thời hạn tuyển dụng</label>
                                        <input type="text" id='datepicker'
                                            class="form-control datepicker @error('application_deadline') is-invalid @enderror"
                                            placeholder="Nhập thời hạn" name="application_deadline" value="{{ old('application_deadline') }}">
                                    </div>
                                    @error('application_deadline')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
                                    <hr width="100%" />

                                    <div class="form-group">
                                        <label>Số lượng ứng viên</label>
                                        <input type="number"
                                            class="form-control @error('number_of_applicants') is-invalid @enderror"
                                            placeholder="Nhập số lượng ứng viên" name="number_of_applicants" value="{{ old('number_of_applicants') }}">
                                    </div>
                                    @error('number_of_applicants')
                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                    @enderror
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
