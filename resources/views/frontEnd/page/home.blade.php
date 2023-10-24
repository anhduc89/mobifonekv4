@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection


@section('content')
    <main>

        <style>
            .slider-bg1 {
                background-image: url({{ asset('frontEnd/img/hero//slider-9.jpg ') }});
            }
        </style>

        <section class="slider-area position-relative">
            <div class="slider-active">

                <div class="single-slider slider-height hero-overly slider-bg1 d-flex  align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-12">
                                <div class="hero-caption">
                                    {{-- <span data-animation="fadeInUp" data-delay=".2s" style="color: red">Chúng tôi là</span>
                                <h1 data-animation="fadeInUp" data-delay=".2s" style="color: blue">CÔNG TY DỊCH VỤ MOBIFONE KHU VỰC 4</h1> --}}
                                    {{-- <P data-animation="fadeInUp" data-delay=".4s">Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.
                                    Suspendisse varius enim in eros elementum tristique.</P> --}}
                                    {{-- <a href="programs.html" class="btn_1 hero-btn" data-animation="fadeInUp"
                                    data-delay=".8s">Liên Hệ ngay</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="about-area section-bg section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">

                        <div class="about-img about-img1  ">
                            <img src="{{ asset('frontEnd/img/hero/about1.png') }}" alt>
                        </div>
                    </div>
                    <div class="offset-xl-1 offset-lg-0 offset-sm-1 col-xxl-5 col-xl-5 col-lg-6 col-md-9 col-sm-11">
                        <div class="about-caption about-caption1">

                            <div class="section-tittle m-0">
                                <h2>CÔNG TY DỊCH VỤ MOBIFONE KHU VỰC 4</h2>
                                <p class="mb-30">Có trụ sở chính tại Phú Thọ, chịu trách nhiệm kinh doanh toàn bộ các dịch
                                    vụ do
                                    Tổng công ty cung cấp đối với tất cả các nhóm khách hàng theo mục tiêu, quy hoạch và kế
                                    hoạch
                                    phát triển của Tổng Công ty trên địa bàn các tỉnh: Lào Cai, Lai Châu, Điện Biên, Yên
                                    Bái, Sơn La,
                                    Phú Thọ, Hòa Bình, Hà Nam, Nam Định, Ninh Bình, Vĩnh Phúc, Hà Giang, Tuyên Quang.
                                </p>
                                <p>Địa chỉ: Đường Nguyễn Tất Thành, khu Đồng Mạ, phường Tiên Cát, TP. Việt Trì, tỉnh Phú Thọ
                                </p>
                                <a href="#" class="browse-btn mt-20">Tìm hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .visit-three .visit-team {
                background-image: url({{ asset('frontEnd/img/elements/e1.jpg') }});
            }
        </style>
        {{-- Giá trị cốt lõi --}}
        <section class="visit-three fix">

            <div class="tailor-details">
                <div class="section-tittle mb-40">
                    <h2>Giá trị cốt lõi</h2>
                    <p>Đứng trước bối cảnh mới, với định hướng chuyển đổi từ kinh doanh dịch vụ viễn thông trở thành nhà
                        cung
                        cấp hạ tầng số và dịch vụ số tại Việt Nam, từng người MobiFone đồng lòng quyết tâm sẽ thực hiện theo
                        định hướng văn hóa mới kể từ năm 2021, bao gồm 04 giá trị cốt lõi là: <b>Thần tốc - Đổi mới - Chuyên
                            nghiệp - Hiệu quả </b>.</p>
                </div>

                <div class="single-gallery mb-15">
                    <div class="thumb-content-box d-flex">
                        <div class="thumb-content">
                            <div class="capt">
                                <h3>Giá trị “Thần tốc”</h3>
                                <p>Có thể khẳng định một cách chắc chắn rằng trong lĩnh vực công nghệ số,<br> tốc độ là yếu
                                    tố quyết định.
                                    Trong không gian số không hề... </p>
                            </div>
                            <a href="/gioi-thieu-cong-ty"><i class="ti-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-gallery mb-15">
                    <div class="thumb-content-box d-flex">
                        <div class="thumb-content">
                            <div class="capt">
                                <h3>Giá trị “Đổi mới”</h3>
                                <p>Để MobiFone có thể hiện thực hóa tầm nhìn của mình, chúng ta cần phải <br>
                                    ĐỔI MỚI. Đây không chỉ là khẩu hiệu mà còn là mệnh lệnh...</p>
                            </div>
                            <a href="/gioi-thieu-cong-ty"><i class="ti-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="single-gallery mb-15">
                    <div class="thumb-content-box d-flex">
                        <div class="thumb-content">
                            <div class="capt">
                                <h3>Giá trị “Chuyên nghiệp”</h3>
                                <p>Không thể thực hiện giá trị “Đổi mới” hay “Thần tốc” nếu thiếu đi nền <br>tảng của giá
                                    trị “Chuyên nghiệp”...</p>
                            </div>
                            <a href="/gioi-thieu-cong-ty"><i class="ti-angle-right"></i></a>
                        </div>
                    </div>
                </div>


                <div class="single-gallery mb-15">
                    <div class="thumb-content-box d-flex">
                        <div class="thumb-content">
                            <div class="capt">
                                <h3>Giá trị “Hiệu quả”</h3>
                                <p>“Hiệu quả” là giá trị cốt lõi thể hiện nét văn hóa nổi bật của MobiFone<br>
                                    trong suốt chiều dài lịch sử hình thành và phát triển...</p>
                            </div>
                            <a href="/gioi-thieu-cong-ty"><i class="ti-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="visit-team"></div>
        </section>




        {{-- Sản phẩm --}}
        <style>
            h2 a:hover {
                color: #1f67b0
            }

            .lSSlideOuter {
                position: relative;
            }

            .content-image {
                position: relative;
                z-index: 1;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            .box-detail-service {
                padding: 20px;
                margin-top: -30px;
                position: relative;
            }

            .box-detail {
                box-shadow: 0 20px 40px rgba(0,0,0,.06);
                margin-top: -30px;
                border: 1px solid #e0e0e0;
                border: 1px solid #e0e0e0;
                border-top: 5px solid #0a4874;
                padding: 20px;
                background-color: #fff;
                position: relative;
                z-index: 10;
                box-shadow: 0 2px 10px rgba(0,0,0,.06);
                border-radius: 0 0 8px 8px;
            }

            .home-blog .single-blogs {
                border: 0px solid #D9E2E9;
            }
            .home-blog .single-blogs:hover {
                border: 0px solid #D9E2E9;
            }
        </style>

        <section class="home-blog section-padding border-bottom clearfix">
            <div class="container" style="max-width: 95%">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">

                        <div class="section-tittle text-center mb-40">
                            <h2><a href="/san-pham">Sản phẩm - Dịch vụ</a></h2>
                            {{-- <p>Công ty dịch vụ Mobifone Khu vực 4</p> --}}
                        </div>
                    </div>
                </div>

                <div class="row lSSlideOuter">
                    @foreach ($listProduct as $item)
                        <div class="col-lg-4 col-md-4">
                            <a href="/san-pham/{{ $item->slug }}">
                                <div class="single-blogs mb-30 full-height" style="height: 100% !important;">
                                    <div class="blog-img content-image">
                                        <img src="{{ $item->image_path }}" alt>
                                    </div>
                                    <div class="box-detail-service">
                                        <div class="blog-caption  box-detail">
                                            <h3><a href="/san-pham-dich-vu/{{ $item->slug }}">{{ $item->name }}</a></h3>
                                            <p>{!! $item->short_content !!} </p>
                                            {{-- <p> <?php echo $item->contents; ?> </p> --}}
                                            {{-- <a href="#" class="browse-btn">Learn More</a> --}}
                                        </div>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        
        {{-- Tin tức --}}
        <section class="class-offer-area section-padding border-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">

                        <div class="section-tittle d-flex justify-content-between align-items-center">
                            <h2>TIN TỨC</h2>
                            <a href="#" class="browse-btn mb-20">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($listNews as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties__card">
                                    <div class="properties__img">
                                        <a href="/tin-tuc/chi-tiet/{{ $item->slug }}"><img src="{{ $item->image_path }}"
                                                alt></a>
                                    </div>
                                    <div class="properties__caption text-center">
                                        <h3><a href="/tin-tuc/chi-tiet/{{ $item->slug }}">{{ $item->title }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <section class="brand-area section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">

                        <div class="section-tittle text-center mb-60">
                            <h2>Đối tác của chúng tôi</h2>
                            <p>Được tin tưởng bởi các khách hàng lớn</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-end">
                    <div class="col-xl-12 col-lg-9">
                        <div class="brand-active text-center">

                            @foreach ($files as $item)
                                {{-- {{ asset( 'frontEnd/img/partner/' ) .  $item -> getFilename() }} --}}
                                <div class="single-brand">
                                    <img src="{{ asset('frontEnd/img/partner') . '/' . $item->getFilename() }}" alt
                                        width="90%">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- <section class="visit-one fix">

        <div class="visit-team">
            <div class="wrapper"></div>
        </div>

        <div class="tailor-details">
            <div class="section-tittle section-tittle2 mb-25">
                <h2>TRUSTED BY OVER <br> 6000+ STUDENTS</h2>
                <p class="mb-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas felis felis,
                    vulputate sit amet mauris et, semper aliquam ligula. Integer efficitur tellus metus, sed feugiat
                    leo posuere ac. Morbi vitae tincidunt malesuada massa.</p>
                <p class="mb-30">Maecenas felis felis, vulputate sit amet mauris et, semper aliquam ligula. Integer
                    efficitur tellus metus, sed feugiat leo posuere ac. Morbi vitae tincidunt mi, et malesuada
                    massa.</p>
                <a href="#" class="browse-btn browse-btn2 mt-20">Join Now</a>
            </div>
        </div>
    </section> --}}

    </main>
@endsection
