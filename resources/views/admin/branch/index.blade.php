@extends('layouts.admin')

@section('title')
    <title>Chi nhánh</title>
@endsection


@section('content')
    <div class="content-wrapper">

        @include('partials.content-header', [
            'name' => 'Chi nhánh',
            'key' => 'Danh sách',
            'link' => 'infoCompany.infor',
        ])


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('infoCompany.createBranch') }}" class="btn btn-block btn-outline-success btn-admin-custom"> Thêm
                            mới </a>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Chi nhánh</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-border text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Chi nhánh</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt = 1;

                                        foreach ($listBranch as $item)
                                        {
                                            echo ' <tr>
                                                <th>' . $stt . ' </th>
                                                <td>' . $item['name'] .' </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-success btn-sm">Chỉnh sửa</button>
                                                </td>
                                                </tr>';
                                                $stt ++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
