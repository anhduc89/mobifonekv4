@extends('layouts.admin')

@section('title')
    <title>Thông tin công ty</title>
@endsection

@section('css-custom-admin')
    <link href="{{ asset('admins/news/news.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', [
            'name' => 'Thông tin công ty',
            'key' => 'thông tin',
            'link' => 'infoCompany.infor',
        ])
        <!-- Main content -->

        <form
            action="<?php if(empty($inforCompany)){?>{{ route('infoCompany.addInfor') }}<?php } else {?>{{ route('infoCompany.updateInfor', ['id' => $inforCompany['id'] ]) }}<?php } ?>" method="POST" enctype="multipart/form-data">
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
                                                <td>Địa chỉ</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('address') is-invalid @enderror"
                                                            placeholder="Nhập địa chỉ công ty" name="address"
                                                            value="<?php if (!empty($inforCompany['address'])) {
                                                                echo $inforCompany['address'];
                                                            } else { ?> {{ old('address') }} <?php } ?>">
                                                    </div>
                                                    @error('address')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror


                                                </td>

                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Email</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            placeholder="Nhập email" name="email"
                                                            value="<?php if (!empty($inforCompany['email'])) {
                                                                echo $inforCompany['email'];
                                                            } else { ?> {{ old('email') }} <?php } ?>">
                                                    </div>

                                                    @error('email')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Số điện thoại</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            placeholder="Nhập số điện thoại liên hệ" name="phone"
                                                            value="<?php if (!empty($inforCompany['phone'])) {
                                                                echo $inforCompany['phone'];
                                                            } else { ?> {{ old('phone') }} <?php } ?>">
                                                    </div>
                                                    @error('phone')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Bản đồ</td>
                                                <td>
                                                    <div class="form-group">
                                                        <textarea class="form-control @error('map') is-invalid @enderror" name="map" id="" rows="5"
                                                            style="width: 100%"><?php if (!empty($inforCompany['map'])) {echo $inforCompany['map'];} else{ ?>{{ old('map') }}<?php } ?>
                                                </textarea>
                                                    </div>
                                                    @error('map')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>Logo</td>
                                                <td>
                                                    <div class="form-group @error('image_logo_path') is-invalid @enderror">
                                                        <input type="file" class="form-control-file" name="image_logo_path">

                                                        <?php if (!empty($inforCompany['image_logo'])) { ?>
                                                        <img src=" {{ $inforCompany['image_logo_path'] }} "
                                                            class="image-list" style="margin-top:10px">
                                                        <?php }  ?>
                                                    </div>
                                                    @error('image_logo_path')
                                                        <div class="alert alert-warning text-error">{{ $message }}</div>
                                                    @enderror
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>6.</td>
                                                <td>Favicon</td>
                                                <td>
                                                    <div class="form-group @error('image_favicon_path') is-invalid @enderror">
                                                        <input type="file" class="form-control-file" name="image_favicon_path">
                                                        <?php if (!empty($inforCompany['favicon'])) { ?>
                                                        <img src=" {{ $inforCompany['image_favicon_path'] }} "
                                                            class="image-list" style="margin-top:10px">
                                                        <?php }?>
                                                    </div>
                                                    @error('image_favicon_path')
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
