@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Mobifone Khu Vực 4 | {{ $detailProduct->name }}</title>
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
                                <h2>Sản Phẩm - Dịch Vụ</h2>
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Suspendisse varius enim in eros elementum tristique.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="assets/img/blog/single_blog_1.jpg" alt>
                            </div>
                            <div class="blog_details">
                                <h2 style="color: #2d2d2d;">{{ $detailProduct->name }} </h2>
                                <img class="card-img rounded-0" src="{{ $detailProduct->image_path }}" alt>
                                <ul class="blog-info-link mt-3 mb-4">
                                    {{-- <li><a href="#"><i class="fa fa-user"></i>{{ $detailProduct -> user_id }}</a></li> --}}
                                    {{-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> --}}
                                </ul>
                                <?php echo $detailProduct->contents; ?>
                            </div>
                            <hr />
                            <div class="share">
                                <h4>Chia sẻ </h4>

                                {{-- ------------------------------------------------------------- --}}
                                <div class="singular-sidebar side-bar-height" data-module="social-pin">
                                    <ul class="cpanel-action social-pin">
                                        <li>
                                            <a class="cpanel-item facebook" target="_blank"
                                                title="Chia sẻ bài viết lên facebook">
                                                <svg width="40" height="40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M21.125 16.3v2.9h2.925c.225 0 .337.2.337.4l-.45 1.9c0 .1-.225.2-.337.2h-2.475V29H17.75v-7.2h-1.912c-.225 0-.338-.1-.338-.3v-1.9c0-.2.113-.3.338-.3h1.912V16c0-1.7 1.462-3 3.375-3h3.038c.224 0 .337.1.337.3v2.4c0 .2-.113.3-.337.3h-2.7c-.226 0-.338.1-.338.3z"
                                                        fill="#292D32">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="cpanel-item twitter" target="_blank"
                                                title="Chia sẻ bài viết lên twitter">
                                                <svg width="40" height="40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M29.5 15.5c-.675.3-1.35.4-2.137.5.787-.4 1.35-1 1.575-1.8-.675.4-1.463.6-2.363.8-.675-.6-1.688-1-2.7-1-1.913 0-3.6 1.5-3.6 3.3 0 .3 0 .5.113.7-3.038-.1-5.85-1.4-7.65-3.4-.338.5-.45 1-.45 1.7 0 1.1.675 2.1 1.687 2.7-.563 0-1.125-.2-1.688-.4 0 1.6 1.238 2.9 2.925 3.2-.337.1-.675.1-1.012.1-.225 0-.45 0-.675-.1.45 1.3 1.8 2.3 3.487 2.3-1.237.9-2.812 1.4-4.612 1.4h-.9c1.688.9 3.6 1.5 5.625 1.5 6.75 0 10.462-5 10.462-9.3v-.4c.788-.5 1.463-1.1 1.913-1.8z"
                                                        fill="#292D32" stroke="#292D32" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>

                                        <li class="zalo-share-button">
                                            <button class="cpanel-item zalo" title="Chia sẻ bài viết lên zalo">
                                                <svg width="40" height="40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#IconZalo_svg__a)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M20.68 17.52v-.456h1.368v6.418h-.782a.585.585 0 0 1-.585-.581 3.334 3.334 0 0 1-5.301-2.69 3.334 3.334 0 0 1 5.3-2.69zM15.026 15v.208c0 .388-.052.705-.305 1.077l-.03.035a7.62 7.62 0 0 0-.246.288l-4.39 5.51h4.97v.78a.585.585 0 0 1-.585.584H8v-.367c0-.45.112-.652.253-.861l4.68-5.792H8.194V15h6.83zm8.681 8.482a.488.488 0 0 1-.487-.487V15h1.463v8.482h-.976zm5.304-6.644a3.357 3.357 0 1 1 0 6.713 3.357 3.357 0 0 1 0-6.713zm-10.297 5.333a1.96 1.96 0 1 0 0-3.92 1.96 1.96 0 1 0 0 3.92zm10.297-.003a1.975 1.975 0 1 0-.001-3.95 1.975 1.975 0 0 0 0 3.95z"
                                                            fill="#292D32">
                                                        </path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="IconZalo_svg__a">
                                                            <path fill="#fff" transform="translate(8 15)"
                                                                d="M0 0h25v9H0z"></path>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="cpanel-item link" title="Copy">
                                                <svg width="40" height="40" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#IconLinking_svg__prefix__clip0_608_611)"
                                                        fill="#292D32">
                                                        <path
                                                            d="M16.5 28c-1.2 0-2.3-.5-3.2-1.3-1.8-1.8-1.8-4.6 0-6.4l.7-.7 1.4 1.4-.7.7c-1 1-1 2.6 0 3.6s2.6 1 3.6 0l3-3c1-1 1-2.6 0-3.6l-.7-.7 1.4-1.4.7.7c1.8 1.8 1.8 4.6 0 6.4l-3 3c-.8.8-2 1.3-3.2 1.3z">
                                                        </path>
                                                        <path
                                                            d="m18 23.4-.7-.7c-1.8-1.8-1.8-4.6 0-6.4l3-3c.9-.9 2-1.3 3.2-1.3 1.2 0 2.3.5 3.2 1.3 1.8 1.8 1.8 4.6 0 6.4l-.7.7-1.4-1.4.7-.7c1-1 1-2.6 0-3.6s-2.6-1-3.6 0l-3 3c-1 1-1 2.6 0 3.6l.7.7-1.4 1.4z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </button>
                                        </li>

                                    </ul>
                                </div>


                                {{--  --}}
                                <input type="hidden" id="linkShare" value="{{ url()->current() }}">
                                {{-- <a id="shareWithFb"><i class="fab fa-facebook-f"></i></a> --}}
                                {{-- <a href=""><i class="fab fa-tiktok"></i></a> --}}
                                {{-- <a id="shareWithTwitter"><i class="fab fa-twitter"></i></a>
                                <a id="copyToClipboard"><i class="fas fa-link"></i></a> --}}
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            {{-- form Search --}}
                            <aside class="single_sidebar_widget search_widget">
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
                            </aside>

                            <style>
                                a.active {
                                    background: -webkit-linear-gradient(131deg, #005db2 0%, #005db2 99%);
                                }
                            </style>

                            {{-- Danh mục tin tức --}}
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Danh mục tin tức</h4>
                                <ul class="list cat-list">
                                    @foreach ($listNewsCategory as $item)
                                        <li>
                                            <a href="/tin-tuc/danh-muc/{{ $item->slug_name }}" class="d-flex ">
                                                <p>{{ $item->name }}</p>
                                                <p>({{ $item->total_news }})</p>
                                            </a>
                                        </li>
                                    @endforeach


                                </ul>
                            </aside>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('js-custom-frontend')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script src="{{ asset('frontEnd/js/custom_js.js') }}"></script>
@endsection
