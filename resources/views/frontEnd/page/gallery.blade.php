@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Gallery</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection

@php
    // Lấy thông tin công ty
    $info_companies = session()->get('frontend')['info_companies'];
@endphp

@section('content')
    <main>

        <div class="slider-area">
            <div class="slider-height2 slider-bg2 d-flex hero-overly align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="hero-caption hero-caption2">
                                <h2>Hình ảnh công ty</h2>
                                <p>Ban lãnh đạo công ty, các hoạt động sản xuất kinh doanh và team building</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            /* .items {
                    column-count: 3;
                    column-gap: 10px;
                }

                .item {
                    break-inside: avoid;
                }

                .content {
                    background: #CCC;
                    padding: 15px;
                    margin-top: 10px;
                }

                .item:first-child .content {
                    margin-top: 0;
                } */
            /* .grid-sizer,
            .grid-item {
                width: 20%;
            }


            .grid-item--width2 {
                width: 40%;
            } */
        </style>
        <section class="gallery-section contact-section">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200 }'>
                            <?php
                                 foreach ($listImage as $item) {
                                    echo '
                                        <div class="grid-item" style="background-image: url(' . $item->path . ');
                                                        background-size: cover;
                                                        background-position: center center;
                                                        background-repeat: no-repeat;>

                                        </div> ';
                                 }

                            ?>



                        </div>
                        {{-- <?php
                        // for ($i = 1; $i < 6; $i++) {
                        //     foreach ($listImage as $item) {
                        //         echo '<div class="grid">
                        //                 <div class="grid-sizer"></div>
                        //                 <div class="grid-item" style="background-image: url(' . $item->path . ');     background-size: cover;
                        //                     background-position: center center;
                        //                     background-repeat: no-repeat;></div>
                        //             </div>';
                        // echo '<div class="grid">
                        //         <div class="content"  height: 500px;">
                        //         </div>
                        //     </div>';
                        //     }
                        // }
                        ?> --}}


                    </div>
                </div>
            </div>
        </section>


    </main>

    {{-- <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <script>
        $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 200
        });
    </script> --}}


@endsection





