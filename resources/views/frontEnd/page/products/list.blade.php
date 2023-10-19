@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Sản phẩm | Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection

<style>
    /* .full-height {
        height: 95%;
    }
    .blog-caption p span {
        line-height: 25px !important;
    } */

</style>

@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-height2 slider-bg2 hero-overly d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="hero-caption hero-caption2">
                                <h2>Sản phẩm</h2>
                                <p>Chúng tôi mang đến những sản phẩm - dịch vụ chất lượng tốt nhất phục vụ cho hàng triệu khách hàng</p>
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
                            <h2>Các sản phẩm của chúng tôi</h2>
                            {{-- <p>Maecenas felis felis, vulputate sit amet mauris et, semper aliquam ligula. Integer
                            efficitur tellus metus, sed feugiat leo posuere ac. Morbi vitae tincidunt mi, et
                            malesuada massa.</p> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($listProduct as $item)
                        <div class="col-lg-4 col-md-4">
                            <div class="single-blogs mb-30  full-height">
                                <div class="blog-img">
                                    <img src="{{ $item->image_path }}" alt="{{ $item->image_name }}">
                                </div>
                                <div class="blog-caption">
                                    <h3><a href="/san-pham-dich-vu/{{ $item->slug }}">{{ $item->name }}</a></h3>
                                    <p>{!! $item->short_content !!}</p>
                                    <a href="/san-pham-dich-vu/{{ $item->slug }}" class="browse-btn">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>

    </main>
@endsection
