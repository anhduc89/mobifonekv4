@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Sản phẩm | Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    {{-- <link rel="stylesheet" href="{{ asset('admins/news/news.css') }}"> --}}
@endsection


@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-height2 slider-bg2 hero-overly d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="hero-caption hero-caption2">
                                <h2>Tuyển dụng</h2>
                                <p>Bạn đang tìm kiếm một môi trường làm việc chuyên nghiệp, năng động, hiện đại,
                                    sáng tạo nơi bạn được trao cơ hội, được cống hiến và được ghi nhận? <br>

                                    Hãy gia nhập Công ty dịch vụ Mobifone Khu Vực 4 ngay hôm nay</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="home-blog section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">

                        <div class="section-tittle text-center mb-40">
                            <h2>TÌM VIỆC HAY ĐẾN NGAY MOBIFONE</h2>
                            {{-- <p>Maecenas felis felis, vulputate sit amet mauris et, semper aliquam ligula. Integer
                            efficitur tellus metus, sed feugiat leo posuere ac. Morbi vitae tincidunt mi, et
                            malesuada massa.</p> --}}
                        </div>
                    </div>
                </div>

                <style>
                    .full-height {
                        height: 95%;
                    }

                    .sticky-bar {
                        position: relative;
                    }
                </style>
                <div class="row">
                    @php
                        $array_vitri = [];
                    @endphp
                    @foreach ($listProduct as $key => $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blogs mb-30  full-height">
                                <div class="blog-img" style="height: 45%">
                                    <img src="{{ $item->image_path }}" alt="{{ $item->image_name }}">
                                </div>
                                <div class="blog-caption">
                                    <h3><a data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop{{ $key }}">{{ $item->name }}</a>
                                    </h3>
                                    <p><i class="fa fa-users" aria-hidden="true"></i> Số lượng: 5</p>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i> Hạn chót: 20/11/2023</p>
                                    {{-- <a href="/san-pham-dich-vu/{{ $item -> slug}}" class="browse-btn">Xem chi tiết</a> --}}


                                </div>
                                <button class="genric-btn success radius" style="WIDTH: 100%;" data-bs-toggle="modal" data-bs-target="#formModal" onclick="NopCv({{$item -> id}})">Nộp CV</button>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{ $key }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $item->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $item->contents; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close{{ $key }}">Đóng</button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal" onclick="closeModal({{ $key }})" >Nộp CV</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $array = [ 'key'    =>  $item -> id,

                                       'value' =>  $item -> name];

                            array_push($array_vitri, $array);
                        @endphp
                    @endforeach


                </div>


            </div>
        </section>
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Nộp CV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('tuyenDungFormFrontEnd')}}" name="nopcv" id="nopcv" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Vị trí:</label>
                        <select name="vitri" id="vitriungtuyen" required>
                            <option value=""> --Chọn vị trí tuyển dụng--</option>
                            @foreach ($array_vitri as $item)
                                <option value="{{ $item['key'] }}"> {{ $item['value'] }} </option>
                            @endforeach
                        
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Họ tên:</label>
                        <input type="text" name="name" class="form-control" id="name" required >
                    </div>
                    <div class="mb-3">
                        <label for="number_phone" class="col-form-label">Số điện thoại:</label>
                        <input type="text" name="number_phone" class="form-control" id="number_phone" required >
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Địa chỉ:</label required>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <div class="mb-3">
                        <label for="fileCv" class="col-form-label">Cv:</label >
                        <input type="file" name="fileCv" class="form-control" id="fileCv" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Gửi CV</button>
                    </div>
                </form>
            </div>
           
            </div>
        </div>
        </div>

    </main>


    <script>

        function NopCv(id){
            
            // alert(id);
            // Get the select element
            var selectElement = document.getElementById("vitriungtuyen");

            // Set the selected option by value
            selectElement.value = id;
            
        }

        function closeModal(id){

            document.getElementById('close' + id).click()

        }

    </script>
@endsection
