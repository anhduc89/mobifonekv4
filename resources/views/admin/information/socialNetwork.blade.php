@extends('layouts.admin')

@section('title')
    <title>Thông tin mạng xã hội</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Thông tin mạng xã hội',
            'key' => 'thông tin',
            'link' => 'infoCompany.infor',
        ])
        <!-- Main content -->

        <form
            action="{{ route('infoCompany.updateSocialNetwork', ['id' => $inforCompany['id'] ]) }}" method="POST" enctype="multipart/form-data">
           @csrf
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thông tin</h3>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Facebook</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('facebook') is-invalid @enderror"
                                                            placeholder="Link facebook" name="facebook"
                                                            value="{{ $inforCompany['facebook'] }}">
                                                    </div>
                                                    @error('facebook')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror


                                                </td>

                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Tiktok</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('tiktok') is-invalid @enderror"
                                                            placeholder="Link tiktok" name="tiktok"
                                                            value="{{ $inforCompany['tiktok'] }}">
                                                    </div>

                                                    @error('tiktok')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Zalo</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('zalo') is-invalid @enderror"
                                                            placeholder="Link zalo" name="zalo"
                                                            value="{{ $inforCompany['zalo'] }}">
                                                    </div>
                                                    @error('zalo')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Youtube</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('youtube') is-invalid @enderror"
                                                            placeholder="Link youtube" name="youtube"
                                                            value="{{ $inforCompany['youtube'] }}">
                                                    </div>
                                                    @error('youtube')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-block btn-outline-info">
                                        <?php if (empty($inforCompany)) {
                                            echo 'Thêm mới';
                                        } else {
                                            echo 'Cập nhật';
                                        } ?>

                                    </button>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->

    </div>
@endsection
