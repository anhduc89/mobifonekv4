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
                    {{-- <ul class="nav">
                        <li data-filter="all"> Tất cả </li>
                        @foreach ($listCategories as $item)
                            <li data-filter="{{ $item->id }}"> -- {{ $item->name }} </li>
                        @endforeach
                    </ul> --}}


                    @foreach ($listProduct as $item)
                        {{-- <div class="filter-container"> --}}
                        <div class="col-lg-4 col-md-4 filter-container" data-category="{{ $item->product_categories }}"
                            data-sort="value">
                            <div class="single-blogs mb-30 full-height">
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

                        {{-- </div> --}}
                        {{-- <div class="filtr-item" data-category="1" data-sort="value">
                                <img src="img/sample1.jpg" alt="sample" />
                            </div>
                            <div class="filtr-item" data-category="2, 1" data-sort="value">
                                <img src="img/sample2.jpg" alt="sample" />
                            </div>
                            <div class="filtr-item" data-category="1, 3" data-sort="value">
                                <img src="img/sample3.jpg" alt="sample" />
                            </div> --}}
                    @endforeach



                    {{-- @foreach ($listProduct as $item)
                        <div class="col-lg-4 col-md-4 filter" data-category="{{ $item->product_categories }}"
                            data-sort="value">
                            <div class="single-blogs mb-30 full-height">
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
                    @endforeach --}}


                </div>
            </div>
        </section>

    </main>
@endsection

@section('js-custom-frontend')
    <script type="text/javascript"  src="{{ asset('frontEnd/js/jquery.filterizr.min.js') }}"></script>
    {{-- <script src="{{ asset('frontEnd/js/custom_js.js') }}"></script> --}}
    <script type="text/javascript">
        const options = {
            animationDuration: 0.5, // in seconds
            callbacks: {
                onFilteringStart: function() {},
                onFilteringEnd: function() {},
                onShufflingStart: function() {},
                onShufflingEnd: function() {},
                onSortingStart: function() {},
                onSortingEnd: function() {}
            },
            controlsSelector: '', // Selector for custom controls
            delay: 0, // Transition delay in ms
            delayMode: 'progressive', // 'progressive' or 'alternate'
            easing: 'ease-out',
            filter: 'all', // Initial filter
            filterOutCss: { // Filtering out animation
                opacity: 0,
                transform: 'scale(0.5)'
            },
            filterInCss: { // Filtering in animation
                opacity: 0,
                transform: 'scale(1)'
            },
            gridItemsSelector: '.filtr-container',
            gutterPixels: 0, // Items spacing in pixels
            layout: 'sameSize', // See layouts
            multifilterLogicalOperator: 'or',
            searchTerm: '',
            setupControls: true, // Should be false if controlsSelector is set
            spinner: { // Configuration for built-in spinner
                enabled: false,
                fillColor: '#2184D0',
                styles: {
                    height: '75px',
                    margin: '0 auto',
                    width: '75px',
                    'z-index': 2,
                },
            },
        }

        const filterizr = new Filterizr('.filter-container', options);
    </script>
@endsection
