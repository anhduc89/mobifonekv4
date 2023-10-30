@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Sản phẩm | Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/list_product.css') }}">
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
                                <h2>Sản phẩm - dịch vụ</h2>
                                <p>Chúng tôi mang đến những sản phẩm - dịch vụ chất lượng tốt nhất phục vụ cho hàng triệu
                                    khách hàng</p>
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
                            malesuada massa.</p>

                            data-multifilter="{{ $item->product_categories }}"
                            --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <ul class="nav">
                        <!-- Filter by referring to "data-category" of items with the value of "data-filter". -->
                        <li data-filter="all"> Tất cả </li>
                        @foreach ($listCategories as $key => $item)
                            <li data-filter="{{$item->id}}"> {{ $item->name }} </li>

                        @endforeach
                    </ul>
                    <div class="wrapper">
                        <div class="filter row">
                            @foreach ($listProduct as $key =>  $item)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 filtr-item" data-category="{{$item->product_categories}}">
                                    <a href="/san-pham-dich-vu/{{ $item->slug }}">
                                        <div class="single-blogs mb-30 full-height" style="height: 100% !important;">
                                            <div class="blog-img content-image" style="background-image: url({{ $item->image_path }});"> </div>
                                            <div class="box-detail-service">
                                                <div class="blog-caption box-detail">
                                                    <h3><a href="/san-pham-dich-vu/{{ $item->slug }}">{{ $item->name }}</a></h3>
                                                    {{-- {!! $item->short_content !!} --}}
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
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js-custom-frontend')

    <script src="{{ asset('frontEnd/js/jquery.filterizr.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.filter').filterizr();
            var filterSingle = $('.filter').filterizr({
                setupControls: false,
                animationDuration: 0.5,
                delay: 0
            });
            $('.shuffle').click(function () {
                filterSingle.filterizr('shuffle');
            });
            $('.sort').click(function () {
                filterSingle.filterizr('sort');
            });
            });
    </script>
@endsection
