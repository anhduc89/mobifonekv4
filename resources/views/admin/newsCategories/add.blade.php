@extends('layouts.admin')

@section('title')
    <title>Thêm mới danh mục</title>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header',['name' => 'Danh mục tin bài', 'key' => 'Thêm mới', 'link' => 'newsCategories.index'])
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Thêm mới danh mục tin tức</h3>
                            </div>

                            <form action="{{ route('newsCategories.addNewsCategories') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name">
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-outline-success">Thêm mới</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->

    </div>
@endsection
