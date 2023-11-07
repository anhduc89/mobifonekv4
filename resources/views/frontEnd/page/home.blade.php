@extends('frontEnd.layouts.frontend')

@section('title')
    <title>MobiFone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection


@section('content')
    <main>
        <section class="slider-area position-relative">
            <div class="slider-active">
                @foreach ($listSlider as $item)
                    <div class="single-slider slider-height hero-overly slider-bg1 d-flex  align-items-center"
                        style="background-image: url({{ $item->path }});">
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
                @endforeach

            </div>
        </section>


        <section class="about-area section-bg section-padding" style=" ">
            <div class="container custom_container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">

                        {{-- <div class="about-img about-img1  ">
                            <img src="{{ asset('frontEnd/img/hero/about1.png') }}" alt>
                        </div> --}}
                    </div>
                    <div class="offset-xl-1 offset-lg-0 offset-sm-1 col-xxl-5 col-xl-5 col-lg-6 col-md-9 col-sm-11">
                        <div class="about-caption about-caption1">

                            <div class="section-tittle m-0">
                                <h2>CÔNG TY DỊCH VỤ <br/>MOBIFONE KHU VỰC 4</h2>
                                <p class="mb-30" style="text-align:justify">Công ty Dịch vụ MobiFone Khu vực 4 được thành lập vào ngày 10/02/2015, là
                                    đơn vị trực thuộc Tổng Công ty Viễn thông MobiFone, chịu trách nhiệm kinh doanh toàn bộ
                                    các sản phẩm dịch vụ do Tổng Công ty cung cấp trong phạm vi 13 tỉnh/thành phố bao gồm:
                                    <span style="color:#FB1055; font-weight:bold;">Vĩnh Phúc, Phú Thọ, Lào Cai, Yên Bái, Sơn La, Lai Châu, Điện Biên, Ninh Bình, Hà Nam,
                                    Hoà Bình, Nam Định, Hà Giang, Tuyên Quang</span>.
                                    <br/>
                                    Trụ sở của công ty được đặt tại Khu Đồng Mạ, Đường Nguyễn Tất Thành, TP Việt Trì, tỉnh
                                    Phú Thọ.
                                </p>

                                <a href="#" class="browse-btn mt-20">Tìm hiểu thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>

        </style>
        {{-- Giá trị cốt lõi  tailor-details --}}
        <section class="visit-three fix">
            <div class="container custom_container">
                <div class="">
                    <div class="section-tittle mb-40">
                        <h2><i><q>Giá trị cốt lõi</q></i></h2>
                        <i style="text-align:justify">Đứng trước bối cảnh mới, với định hướng chuyển đổi từ kinh doanh dịch vụ viễn thông trở thành nhà
                            cung cấp hạ tầng số và dịch vụ số tại Việt Nam, từng người MobiFone đồng lòng quyết tâm sẽ thực hiện
                            theo định hướng văn hóa mới kể từ năm 2021, bao gồm 04 giá trị cốt lõi là: <span style="color:#FB1055; font-weight:bold;">THẦN TỐC - ĐỔI MỚI - CHUYÊN NGHIỆP - HIỆU QUẢ</span>.
                            Với ý nghĩa, người MobiFone cần Thần tốc trong hành động, Đổi mới trong suy nghĩ, Chuyên nghiệp
                            trong công việc và Hiệu quả trong mọi hoạt động.
                        </i>
                    </div>
                </div>
            </div>


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
                box-shadow: 0 20px 40px rgba(0, 0, 0, .06);
                margin-top: -30px;
                border: 1px solid #e0e0e0;
                border: 1px solid #e0e0e0;
                border-top: 5px solid #0a4874;
                padding: 20px;
                background-color: #fff;
                position: relative;
                z-index: 10;
                box-shadow: 0 2px 10px rgba(0, 0, 0, .06);
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
            <div class="container custom_container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">

                        <div class="section-tittle text-center mb-40">
                            <h2><a href="/san-pham">Sản phẩm - Dịch vụ</a></h2>
                            {{-- <p>Công ty dịch vụ Mobifone Khu vực 4</p> --}}
                        </div>
                    </div>
                </div>

                <div class="row lSSlideOuter ">
                    @foreach ($listProduct as $item)
                        <div class="col-lg-4 col-md-4">
                            <a href="/san-pham-dich-vu/{{ $item->slug }}">
                                <div class="single-blogs mb-30 full-height" style="height: 100% !important;">
                                    <div class="blog-img content-image"
                                        style="background-image: url({{ $item->image_path }}); border-radius: 10px;">
                                        {{-- <img src="{{ $item->image_path }}" alt> --}}
                                    </div>
                                    <div class="box-detail-service">
                                        <div class="blog-caption  box-detail">
                                            <h3><a href="/san-pham-dich-vu/{{ $item->slug }}">{{ $item->name }}</a></h3>
                                            {!! $item->short_content !!}
                                            {{-- <p class="limit-2-lines"> <?php #echo $item->short_content; ?> </p> --}}
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
            <div class="container-fluid custom_container">
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
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="properties pb-30">
                                <div class="properties__card">
                                    <a href="/tin-tuc/chi-tiet/{{ $item->slug }}">
                                        <div class="properties__img"
                                            style="background-image: url({{ $item->image_path }});">

                                            {{-- <img src="{{ $item->image_path }}" alt> --}}

                                        </div>
                                    </a>
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
            <div class="container custom_container">
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
                                    <img src="{{ asset('frontEnd/img/partner') . '/' . $item->getFilename() }}" alt style="width:60%; height: 60%">
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
