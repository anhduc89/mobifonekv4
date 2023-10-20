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

        <section class="blog_area single-post-area section-padding" id="session_detail">
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

    <input type="hidden" id="linkShare" value="{{ url()->current() }}">
        <div class="mf-social-side-list" id="left_sidebar">
            <ul id="ul_left_sidebar">
                <li>
                    <a id="shareWithFb"><i class="fab fa-facebook-f text-white"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                </li>

                <li>
                    <a id="shareWithTwitter"><i class="fab fa-twitter text-white"></i></a>
                </li>
                <li>
                    <a id="copyToClipboard"><i class="fas fa-link text-white"></i></a>
                </li>
            </ul>
        </div>

@endsection

@section('js-custom-frontend')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script src="{{ asset('frontEnd/js/custom_js.js') }}"></script>
@endsection
