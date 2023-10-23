@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Mobifone Khu Vực 4 | {{ $detailTuyenDung->title }}</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection




@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-height2 slider-bg2 d-flex hero-overly align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="hero-caption hero-caption2">
                                <h2>Tuyển dụng</h2>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse varius enim in eros elementum tristique.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="blog_area single-post-area section-padding" id="session_detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post">
                            <div class="blog_details">
                                {{-- <h2 style="color: #2d2d2d;">{{ $detailTuyenDung->name }} </h2>
                                <img class="card-img rounded-0" src="{{ $detailTuyenDung->image_path }}" alt>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i>{{ $detailTuyenDung -> user_id }}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                                <?php echo $detailTuyenDung->contents ?> --}}

                                <div class="card card-job">
                                    <div class="row" style="border-bottom: 2px solid #d8d8d8;padding-bottom:10px">
                                        {{-- <div class="col-2 d-none d-sm-block">
                                            <img src="https://www.mobifone.vn/assets/source/image/logo_MobiFone.jpg"
                                                alt="" width="100%" style="border-radius: 5px">
                                        </div> --}}
                                        <div class="col-12">
                                            <div class="card-job-top-right">
                                                <div class="card-job-title">
                                                    <h3 class="title"><b>{{ $detailTuyenDung -> title }}</b></h3>
                                                    <p class="job">Ngành nghề: {{ $detailTuyenDung -> nganhnghe }}</p>
                                                </div>
                                                <ul class="card-job-body">

                                                    <li class="item">
                                                        <span class="fas fa-dollar-sign"></span>
                                                        Thu nhập: {{ $detailTuyenDung -> mucluong }}
                                                    </li>

                                                    <li class="item">
                                                        <span class="fa fa-users"></span>
                                                        Số lượng: {{ $detailTuyenDung -> number_of_applicants }}
                                                    </li>

                                                    <li class="item">
                                                        <span class="fa fa-calendar"></span>
                                                        Ngày hết hạn: {{  (new DateTime($detailTuyenDung -> application_deadline))->format("d-m-Y") }}
                                                    </li>
                                                </ul>
                                                <div style="float: right">
                                                    <button class="genric-btn info radius btn-recruiment"
                                                        style="text-algin:center" data-bs-toggle="modal"
                                                        data-bs-target="#formModal">Nộp CV</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row job-body">
                                        <?php echo $detailTuyenDung->contents; ?>
                                    </div>

                                </div>

                            </div>
                            <hr />

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            {{-- form Search --}}
                            {{-- <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search Keyword">
                                            <div class="input-group-append d-flex">
                                                <button class="boxed-btn2" type="button">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </aside> --}}

                            <style>
                                a.active {
                                    background: -webkit-linear-gradient(131deg, #005db2 0%, #005db2 99%);
                                }
                            </style>

                            {{-- Danh mục tin tức --}}
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Có thể bạn quan tâm</h4>

                                @if (count($listTuyenDung) > 0)
                                <ul class="list cat-list">
                                    @foreach ($listTuyenDung as $item)

                                        <li>
                                            {{-- <a href="/tin-tuc/danh-muc/{{ $item->slug_name }}" class="d-flex ">
                                                <p>{{ $item->name }}</p>
                                                <p>({{ $item->total_news }})</p>
                                            </a> --}}
                                            <div class="card-job-title">
                                                <h3 class="title"><a href="/tuyen-dung/{{$item -> slug}}">{{$item -> title}} </a></h3>
                                            </div>
                                            <ul class="card-job-body">

                                                <li class="item">
                                                    <span class="fas fa-dollar-sign"></span>
                                                    Thu nhập: {{$item -> mucluong}}
                                                </li>

                                                <li class="item">
                                                    <span class="fa fa-users"></span>
                                                    Số lượng: {{ $item -> number_of_applicants }}
                                                </li>

                                                <li class="item">
                                                    <span class="fa fa-calendar"></span>
                                                    Ngày hết hạn: {{  (new DateTime($item -> application_deadline))->format("d-m-Y") }}
                                                </li>
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                                @else
                                    <div class="text-center" style="margin-top: 20px">
                                        Hiện không có tuyển dụng vị trí khác
                                    </div>
                                @endif


                            </aside>
                        </div>
                    </div>
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
                                <option value="{{ $detailTuyenDung -> id }}">{{ $detailTuyenDung -> title }}</option>
                                {{-- @foreach ($array_vitri as $item)
                                    <option value="{{ $item['key'] }}"> {{ $item['value'] }} </option>
                                @endforeach --}}

                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Họ tên:</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="number_phone" class="col-form-label">Số điện thoại:</label>
                                <input type="text" name="number_phone" class="form-control" id="number_phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="col-form-label">Địa chỉ:</label required>
                                <input type="text" name="address" class="form-control" id="address">
                            </div>
                            <div class="mb-3">
                                <label for="fileCv" class="col-form-label">Cv:</label>
                                <input type="file" name="fileCv" class="form-control" id="fileCv" accept=".pdf,.txt" required>
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
    <input type="hidden" id="linkShare" value="{{ url()->current() }}">
    <div class="mf-social-side-list" id="left_sidebar">
        <ul id="ul_left_sidebar">
            <li>
                <a id="shareWithFb" title="Chia sẻ Facebook"><i class="fab fa-facebook-f text-white"></i></a>
            </li>
            <li>
                <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
            </li>

            <li>
                <a id="shareWithTwitter" title="Chia sẻ X"><i class="fab fa-twitter text-white"></i></a>
            </li>
            <li>
                <a id="copyToClipboard" title="Sao chép link"><i class="fas fa-link text-white"></i></a>
                <p id="Copied"></p>
            </li>
            <li>
                <a id="backPrev" title="Quay lại trang trước"><i class="fas fa-arrow-left text-white"></i></a>
            </li>
        </ul>
    </div>
@endsection

@section('js-custom-frontend')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script src="{{ asset('frontEnd/js/custom_js.js') }}"></script>
@endsection
