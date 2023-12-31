@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Mobifone Khu Vực 4 | {{ $detailNews->title }}</title>
@endsection

@section('meta')
    <?php $url = url()->full(); ?>
    <meta property="og:url" content="{{ $url }}" />
    <meta property="og:type" name="ogtype" content="website" />
    <meta property="og:title" name="ogtitle" content="{{ $detailNews->title }}" />
    {{-- <meta property="og:description" content="{{ $detailNews->short_content }}" /> --}}
    <meta property="og:image" content="{{ $detailNews->image_path }}" />
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection




@php
    // Chuỗi tháng
    $array_month = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mat',
        4 => 'Apr',
        5 => 'May',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Aug',
        9 => 'Sep',
        10 => 'Oct',
        11 => 'Nov',
        12 => 'Dec',
    ];
@endphp

@section('content')
    <main>

        <div class="slider-area">
            <div class="banner-slider slider-height2 slider-bg2 d-flex hero-overly align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="hero-caption hero-caption2">
                                <h2>Bài viết </h2>
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
                                <h2 style="color: #2d2d2d;">{{ $detailNews->title }} </h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><i
                                            class="fas fa-calendar-minus"></i>{{ date('d/m/Y H:i', strtotime($detailNews->date)) }}
                                    </li>
                                    {{-- <li><a href="#"><i class="fa fa-user"></i>{{ $detailNews->user_id }}</a></li> --}}
                                    {{-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> --}}
                                </ul>
                                {{-- <img class="card-img rounded-0" src="{{ $detailNews->image_path }}" alt> <br/> --}}
                                <?php echo $detailNews->content; ?>
                            </div>

                            <hr />


                            <input type="hidden" id="linkShare" value="{{ url()->current() }}">
                            <div class="mf-social-side-list" id="left_sidebar">
                                <ul >
                                    <li>
                                        <a href="javascript:void(0)" onclick="fb_share('{{ $url }}', '{{ $detailNews->title }}')"
                                            id="shareWithFb" title="Chia sẻ Facebook"><i class="fab fa-facebook-f text-white"></i></a>
                                    </li>
                                    {{-- <li>
                                        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </li> --}}

                                    <li>
                                        <a id="shareWithTwitter" onclick="tw_share('{{ $url }}')" title="Chia sẻ X"><i class="fab fa-twitter text-white"></i></a>
                                    </li>
                                    <li>
                                        <a id="copyToClipboard" title="Sao chép link"><i class="fas fa-link text-white"></i></a>
                                        <p id="Copied" style="display:none;"></p>
                                    </li>
                                    <li>
                                        <a id="backPrev" onclick="back()" title="Quay lại trang trước"><i class="fas fa-arrow-left text-white"></i></a>
                                    </li>
                                </ul>
                                <div id="fb-root"></div>
                            </div>

                        </div>
                        {{-- <div class="navigation-top">
                            <div class="d-sm-flex justify-content-between text-center">
                                <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and
                                    4
                                    people like this</p>
                                <div class="col-sm-4 text-center my-2 my-sm-0">
                                </div>
                                <ul class="social-icons">
                                    <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                </ul>
                            </div>
                            <div class="navigation-area">
                                <div class="row">
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/img/post/preview.jpg" alt>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="#">
                                                <h4 style="color: #2d2d2d;">Space The Final Frontier</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="#">
                                                <h4 style="color: #2d2d2d;">Telescopes 101</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="#">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/img/post/next.jpg" alt>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="blog-author">
                            <div class="media align-items-center">
                                <img src="assets/img/blog/author.png" alt>
                                <div class="media-body">
                                    <a href="#">
                                        <h4>Harvard milan</h4>
                                    </a>
                                    <p>Second divided from form fish beast made. Every of seas all gathered use saying
                                        you're, he
                                        our dominion twon Second divided from</p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="comments-area">
                            <h4>05 Comments</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="assets/img/blog/comment_1.png" alt>
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill
                                                which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea
                                                lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="assets/img/blog/comment_2.png" alt>
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill
                                                which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea
                                                lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="assets/img/blog/comment_3.png" alt>
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill
                                                which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea
                                                lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form class="form-contact comment_form" action="#" id="commentForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                placeholder="Write Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="website" id="website" type="text"
                                                placeholder="Website">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Post
                                        Comment</button>
                                </div>
                            </form>
                        </div> --}}
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">

                            {{-- form Search --}}
                            {{-- <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Nhập từ khóa">
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
                                <h4 class="widget_title" style="color: #2d2d2d;">Danh mục tin tức</h4>
                                <ul class="list cat-list">
                                    @foreach ($listNewsCategory as $item)
                                        <li>
                                            <a href="/tin-tuc/danh-muc/{{ $item->slug_name }}" class="d-flex ">
                                                <p>{{ $item->name }} ({{ $item->total_news }})</p>
                                                {{-- <p>({{ $item->total_news }})</p> --}}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </aside>

                            {{-- Các bài tin khác --}}
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Bài viết khác</h4>
                                <ul class="list cat-list">
                                    @foreach ($listNewsOther as $item)
                                        <li>
                                            <a href="/tin-tuc/chi-tiet/{{ $item->slug }}" class="d-flex ">
                                                <img src="{{ $item->image_path }}" alt="{{ $item->image_name }}"
                                                    width="30%" style="height: fit-content;">
                                                <p class="products_other_name">{{ $item->title }}</p>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </aside>
                            {{-- <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title" style="color: #2d2d2d;">Recent Post</h3>
                    <div class="media post_item">
                        <img src="assets/img/post/post_1.jpg" alt="post">
                        <div class="media-body">
                            <a href="blog_details.html">
                                <h3 style="color: #2d2d2d;">From life was you fish...</h3>
                            </a>
                            <p>January 12, 2019</p>
                        </div>
                    </div>
                    <div class="media post_item">
                        <img src="assets/img/post/post_2.jpg" alt="post">
                        <div class="media-body">
                            <a href="blog_details.html">
                                <h3 style="color: #2d2d2d;">The Amazing Hubble</h3>
                            </a>
                            <p>02 Hours ago</p>
                        </div>
                    </div>
                    <div class="media post_item">
                        <img src="assets/img/post/post_3.jpg" alt="post">
                        <div class="media-body">
                            <a href="blog_details.html">
                                <h3 style="color: #2d2d2d;">Astronomy Or Astrology</h3>
                            </a>
                            <p>03 Hours ago</p>
                        </div>
                    </div>
                    <div class="media post_item">
                        <img src="assets/img/post/post_4.jpg" alt="post">
                        <div class="media-body">
                            <a href="blog_details.html">
                                <h3 style="color: #2d2d2d;">Asteroids telescope</h3>
                            </a>
                            <p>01 Hours ago</p>
                        </div>
                    </div>
                </aside>
                <aside class="single_sidebar_widget tag_cloud_widget">
                    <h4 class="widget_title" style="color: #2d2d2d;">Tag Clouds</h4>
                    <ul class="list">
                        <li>
                            <a href="#">project</a>
                        </li>
                        <li>
                            <a href="#">love</a>
                        </li>
                        <li>
                            <a href="#">technology</a>
                        </li>
                        <li>
                            <a href="#">travel</a>
                        </li>
                        <li>
                            <a href="#">restaurant</a>
                        </li>
                        <li>
                            <a href="#">life style</a>
                        </li>
                        <li>
                            <a href="#">design</a>
                        </li>
                        <li>
                            <a href="#">illustration</a>
                        </li>
                    </ul>
                </aside>
                <aside class="single_sidebar_widget instagram_feeds">
                    <h4 class="widget_title" style="color: #2d2d2d;">Instagram Feeds</h4>
                    <ul class="instagram_row flex-wrap">
                        <li>
                            <a href="#">
                                <img class="img-fluid" src="assets/img/post/post_5.jpg" alt>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="img-fluid" src="assets/img/post/post_6.jpg" alt>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="img-fluid" src="assets/img/post/post_7.jpg" alt>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="img-fluid" src="assets/img/post/post_8.jpg" alt>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="img-fluid" src="assets/img/post/post_9.jpg" alt>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img class="img-fluid" src="assets/img/post/post_10.jpg" alt>
                            </a>
                        </li>
                    </ul>
                </aside>
                <aside class="single_sidebar_widget newsletter_widget">
                    <h4 class="widget_title" style="color: #2d2d2d;">Newsletter</h4>
                    <form action="#">
                        <div class="form-group">
                            <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter email'" placeholder="Enter email"
                                required>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">Subscribe</button>
                    </form>
                </aside> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <input type="hidden" id="linkShare" value="{{ url()->current() }}">
    <div class="mf-social-side-list d-none d-sm-block" id="left_sidebar">
        <ul id="ul_left_sidebar">
            <li>
                <a href="javascript:void(0)" onclick="fb_share('{{ $url }}', '{{ $detailNews->title }}')"
                    id="shareWithFb" title="Chia sẻ Facebook"><i class="fab fa-facebook-f text-white"></i></a>
            </li>
            {{-- <li>
                <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
            </li> --}}

            <li>
                <a id="shareWithTwitter" onclick="tw_share('{{ $url }}')" title="Chia sẻ X"><i class="fab fa-twitter text-white"></i></a>
            </li>
            <li>
                <a id="copyToClipboard"title="Sao chép link"><i class="fas fa-link text-white"></i></a>
                <p id="Copied"></p>
            </li>
            <li>
                <a id="backPrev"  onclick="back()"  title="Quay lại trang trước"><i class="fas fa-arrow-left text-white"></i></a>
            </li>
        </ul>
        <div id="fb-root"></div>
    </div>
@endsection

@section('js-custom-frontend')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script src="{{ asset('frontEnd/js/custom_js.js') }}"></script>
    {{-- <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "/connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=720198576693059";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function fb_share(link, title) {
            var app_id = '720198576693059';
            var pageURL = 'https://www.facebook.com/dialog/feed?app_id=' + app_id + '&link=' + link + '';
            var w = 600;
            var h = 400;
            var left = (screen.width / 2) - (w / 2);
            var top = (screen.height / 2) - (h / 2);
            window.open(pageURL, title,
                'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=no,width=' +
                800 + ',height=' + 650 + ',top=' + top + ',left=' + left + '');
        }
    </script> --}}
@endsection
