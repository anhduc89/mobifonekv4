@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Sản phẩm | Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/list_product.css') }}">
@endsection

@section('content')
    <main>

        <div class="slider-area">
            <div class="banner-slider slider-height2 slider-bg2 hero-overly d-flex align-items-center">
                <div class="container custom_container">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="hero-caption hero-caption2">
                                <h2>Sản phẩm - dịch vụ</h2>
                                <p>Chúng tôi mang đến sản phẩm - dịch vụ chất lượng tốt nhất phục vụ cho hàng triệu khách hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="home-blog section-padding border-bottom clearfix" style="min-height: 500px;">
            <div class="container custom_container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-10" >

                        <div class="section-tittle text-center mb-40">
                            <h2><a href="/san-pham-dich-vu">Sản phẩm - Dịch vụ</a></h2>
                            {{-- <p>Công ty dịch vụ Mobifone Khu vực 4</p> --}}
                        </div>
                        {{-- <ul class="nav"> --}}
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Tất cả</button>
                            </li>
                            @php
                                $array_category = [];
                            @endphp
                            @foreach ($listCategories as $key => $item)
                                {{-- <li data-filter="{{ $item->id }}"> {{ $item->name }} </li> --}}

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link btn" id="{{ $item->id }}-tab" data-bs-toggle="tab" data-bs-target="#tab{{ $item->id }}" type="button" role="tab" aria-controls="tab{{ $item->id }}" aria-selected="false">{{ $item->name }}</button>
                                </li>
                                @php
                                    array_push($array_category, $item->id )
                                @endphp
                            @endforeach
                        </ul>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="tab-content" id="myTabContent">

                        {{-- Tất cả --}}
                        <div class="tab-pane fade show active row" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @foreach ($listProduct as $item)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-category="{{$item->product_categories}}"  style="float:left">
                                    <a href="/san-pham-dich-vu/{{ $item->slug }}">
                                        <div class="single-blogs mb-30 full-height" style="height: 100% !important;">
                                            <div class="blog-img content-image" style="background-image: url({{ $item->image_path }}); border-radius: 10px;">
                                                {{-- <img src="{{ $item->image_path }}" alt> --}}
                                            </div>
                                            <div class="box-detail-service">
                                                <div class="blog-caption box-detail">
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
                        @for ($i = 0; $i < count($array_category); $i++)
                            <div class="tab-pane fade" id="tab{{ $array_category[$i] }}" role="tabpanel" aria-labelledby="{{ $array_category[$i] }}-tab">
                            
                            @php
                                $count = 0;
                            @endphp

                            @foreach ($listProduct as $key => $item)

                                @if ($array_category[$i] == $item->product_categories)
                                    
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-category="{{$item->product_categories}}" style="float:left">
                                        <a href="/san-pham-dich-vu/{{ $item->slug }}">
                                            <div class="single-blogs mb-30 full-height" style="height: 100% !important;">
                                                <div class="blog-img content-image" style="background-image: url({{ $item->image_path }}); border-radius: 10px;">
                                                    {{-- <img src="{{ $item->image_path }}" alt> --}}
                                                </div>
                                                <div class="box-detail-service">
                                                    <div class="blog-caption box-detail">
                                                        <h3><a href="/san-pham-dich-vu/{{ $item->slug }}">{{ $item->name }}</a></h3>
                                                        {!! $item->short_content !!}
                                                        {{-- <p class="limit-2-lines"> <?php #echo $item->short_content; ?> </p> --}}
                                                        {{-- <a href="#" class="browse-btn">Learn More</a> --}}
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    </div>
                                    
                                    @php
                                        $count ++;
                                        unset($listProduct[$key])
                                    @endphp

                                @endif

                            @endforeach
                            @if ($count == 0)
                                <div class="text-center" style="margin-top:50px">
                                    <h3>Không có sản phẩm nào</h3>
                                </div>
                            @endif
                            </div>
                        @endfor
                    </div>
                    

                </div>
            </div>
        </section>

    </main>
@endsection

@section('js-custom-frontend')
    {{-- <script src="{{ asset('frontEnd/js/jquery.filterizr.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('.filter').filterizr();
            var filterSingle = $('.filter').filterizr({
                setupControls: false,
                animationDuration: 0.5,
                delay: 0
            });
            $('.shuffle').click(function() {
                filterSingle.filterizr('shuffle');
            });
            $('.sort').click(function() {
                filterSingle.filterizr('sort');
            });
        });
    </script> --}}
@endsection
