@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Về chúng tôi | Mobifone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    {{-- <link rel="stylesheet" href="{{ asset('admins/news/news.css') }}"> --}}
@endsection

@php

    // Lấy thông tin công ty    
    $info_companies = session()->get('frontend')['info_companies']

@endphp

@section('content')
<main>

    <div class="slider-area">
        <div class="slider-height2 slider-bg2 d-flex hero-overly align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                        <div class="hero-caption hero-caption2">
                            <h2>Liện hệ chúng tôi</h2>
                            <p>Công ty dịch vụ Mobifone Khu vực 4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="contact-section">
        <div class="container">
        
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Về chúng tôi - Công ty dịch vụ MobiFone Khu vực 4</h2>
                </div>
                <div class="col-lg-12">
                    <?php echo $aboutUs[0] -> content ?>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
