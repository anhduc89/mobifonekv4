@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Tuyển dụng | Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
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

        @if (session('message'))
            <script>
                alert("{{ session('message') }}")
            </script>
            @php
                session()->forget('message');
            @endphp
        @endif

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
                    @foreach ($listTuyenDung as $key => $item)
                        <div class="col-lg-4 col-md-6" onmouseover="showModal({{ $key }})">
                            <div class="single-blogs mb-30 full-height">
                                <div class="blog-img" style="height: 35%">
                                    <a href="/tuyen-dung/{{ $item->slug }}"><img src="{{ $item->image_path }}"
                                            alt="{{ $item->image_name }}"></a>
                                </div>
                                <div class="blog-caption" style="height: 55%;">
                                    <h3><a href="/tuyen-dung/{{ $item->slug }}" style="height: 55px; font-size: 16px;" class="limit-2-lines"><b>{{ $item->title }}</b></a> </h3>
                                    <p class="job limit-2-lines" style="height: 45px">Ngành nghề: {!! $item->nganhnghe !!}
                                    </p>
                                    <p><i class="fas fa-dollar-sign" aria-hidden="true"></i> Thu nhập:
                                        {{ $item->mucluong }}</p>
                                    <p><i class="fa fa-users" aria-hidden="true"></i> Số lượng:
                                        {{ $item->number_of_applicants }}</p>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i> Hạn nộp hồ sơ:
                                        {{ (new DateTime($item->application_deadline))->format('d-m-Y') }}</p>
                                    {{-- <a href="/san-pham-dich-vu/{{ $item -> slug}}" class="browse-btn">Xem chi tiết</a> --}}

                                    {{-- <button style="display:none" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $key }}" id="openModal{{ $key }}">open</button> --}}
                                </div>
                                <div style="height: 10%">
                                    <button class="genric-btn info radius btn-recruiment" style="width: 100%;"
                                        data-bs-toggle="modal" data-bs-target="#formModal"
                                        onclick="NopCv({{ $item->id }})">Nộp CV</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{ $key }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $item->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $item->contents; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            id="close{{ $key }}">Đóng</button>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#formModal" onclick="closeModal({{ $key }})">Nộp
                                            CV</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $array = ['key' => $item->id, 'value' => $item->title];

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
                        <form action="{{ route('tuyenDungFormFrontEnd') }}" name="nopcv" id="nopcv" method="post"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Vị trí:</label>
                                <select name="vitri" id="vitriungtuyen" class="form-control" required>
                                    <option value=""> --Chọn vị trí tuyển dụng--</option>
                                    @foreach ($array_vitri as $item)
                                        <option value="{{ $item['key'] }}"> {{ $item['value'] }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Họ tên:</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="number_phone" class="col-form-label">Số điện thoại:</label>
                                <input type="text" name="number_phone" class="form-control" id="number_phone"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="mail" class="col-form-label">Email:</label>
                                <input type="text" name="mail" class="form-control" id="mail" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="col-form-label">Địa chỉ:</label required>
                                <input type="text" name="address" class="form-control" id="address">
                            </div>
                            <div class="mb-3">
                                <label for="fileCv" class="col-form-label">Cv:</label>
                                <input type="file" name="fileCv" class="form-control" id="fileCv" accept=".pdf"
                                    required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="genric-btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="genric-btn btn-primary">Gửi CV</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </main>



    <script>
        function NopCv(id) {

            // alert(id);
            // Get the select element
            var selectElement = document.getElementById("vitriungtuyen");

            // Set the selected option by value
            selectElement.value = id;

        }
        // var id_click = "";
        // function showModal(id) {
        //     document.getElementById('openModal' + id).click()
        //     id_click = id;
        // }

        // document.getElementById("staticBackdrop" + id).onmouseleave = function() {
        //     document.getElementById('close' + id).click()
        // };


        function closeModal(id) {

            document.getElementById('close' + id).click()

        }
    </script>
@endsection
