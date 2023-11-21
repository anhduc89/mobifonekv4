@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Tin tức | Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection

@php
    // Chuỗi tháng
    $array_month = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
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
                                <h2>Tin tức</h2>
                                <p>các hoạt động của Công ty Dịch vụ MobiFone Khu vực 4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    {{-- List --}}
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">

                            @foreach ($listNews as $item)
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{ $item->image_path }}" alt>
                                        <a href="/tin-tuc/chi-tiet/{{ $item->slug }}" class="blog_item_date">
                                            <h3>{{ substr($item->date, 8, 2) }}</h3>
                                            <p>{{ $array_month[substr($item->date, 5, 2) * 1.0] }}</p>
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="/tin-tuc/chi-tiet/{{ $item->slug }}">
                                            <h2 class="blog-head" style="color: #2d2d2d;">{{ $item->title }}</h2>
                                        </a>
                                        <p> @php echo $item->short_content  @endphp </p>
                                        <ul class="blog-info-link">
                                            <li><a href="/tin-tuc/chi-tiet/{{ $item->slug }}"><i class="fas fa-tags"></i>
                                                    {{ $item->user_name }}</a></li>
                                            <li><a href="/tin-tuc/danh-muc/{{ $item->category_slug }}"></i>
                                                    {{ $item->category_name }}</a></li>
                                        </ul>
                                    </div>
                                </article>
                            @endforeach

                            {{-- Phân trang --}}
                            {{-- {!! $listNews->links('pagination::bootstrap-4') !!} --}}
                            <nav class="blog-pagination justify-content-center d-flex">
                                @php
                                    $current = $listNews -> currentPage();
                                    $last = $listNews -> lastPage();
                                @endphp
                            <ul class="pagination">
                                {{-- Nếu page hiện tại(current) > 1 thì cho phép về page trước --}}
                                @if ($current > 1)
                                    <li class="page-item">
                                        <a href="?page={{$current - 1}}" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                @endif
                                @if ($last < 6)

                                    @for ($i = 1; $i <= $last; $i++)
                                        <li class="page-item">
                                            <a href="?page={{$i}}" class="page-link {{($i == $current) ? 'active' : '' }}" aria-label="Previous">
                                            {{$i}}
                                            </a>
                                        </li>
                                    @endfor

                                @else
                                    @if ($current > 2)
                                        <li class="page-item">
                                            <a href="?page=1" class="page-link" aria-label="Previous">
                                            1
                                            </a>
                                        </li>
                                        @if ($current > 4)
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li> 
                                        @endif 
                                        @if ($current == 4)
                                            <li class="page-item">
                                                <a href="?page=2" class="page-link">2</a>
                                            </li> 
                                        @endif     
                                    @endif 

                                    @for ($i = 1; $i <= $last; $i++)
                                        
                                        @if ( $i > $current - 2 && $i < $current + 2 )
                                            <li class="page-item">
                                                <a href="?page={{$i}}" class="page-link {{($i == $current) ? 'active' : '' }}" aria-label="Previous">
                                                {{$i}}
                                                </a>
                                            </li>
                                        @endif      
                                    
                                    @endfor

                                    @if ($current < $last - 1)
                                        @if ($current < $last - 3)
                                            <li class="page-item">
                                                <a class="page-link">...</a>
                                            </li> 
                                        @endif
                                        @if ($current == $last - 3)
                                            <li class="page-item">
                                                <a class="page-link">{{$last - 1}}</a>
                                            </li> 
                                        @endif     
                                        <li class="page-item">
                                            <a href="?page={{$last}}" class="page-link" aria-label="Previous">
                                            {{$last}}
                                            </a>
                                        </li>
                                    @endif
                                @endif
                                    

                                @if ($current < $last)
                                    <li class="page-item">
                                        <a href="?page={{$current + 1}}" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
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

                            {{-- Danh mục tin tức --}}
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title" style="color: #2d2d2d;">Danh mục tin tức</h4>
                                <ul class="list cat-list">
                                    @foreach ($listNewsCategory as $item)
                                        <li>
                                            <a href="/tin-tuc/danh-muc/{{ $item->slug_name }}" class="d-flex">
                                                <p>{{ $item->name }} ({{ $item->total_news }})</p>
                                                {{-- <p>({{ $item->total_news }})</p> --}}
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
@endsection
