@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Liên hệ | MobiFone Khu Vực 4</title>
@endsection

@section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/custom_css.css') }}">
@endsection

{{-- @section('css-custom-frontend')
    <link rel="stylesheet" href="{{ asset('admins/news/news.css') }}">
@endsection --}}

@php

    // Lấy thông tin công ty
    $info_companies = session()->get('frontend')['info_companies'];

@endphp

@section('content')
    <main>

        <div class="slider-area">
            <div class="banner-slider slider-height2 slider-bg2 d-flex hero-overly align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-9">
                            <div class="hero-caption hero-caption2">
                                <h2>Liên hệ chúng tôi</h2>
                                <p>Công ty Dịch vụ MobiFone Khu vực 4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('message'))
            <script>
                alert("{{ session('message') }}")
            </script>
            @php
                session()->forget('message');
            @endphp
        @endif
        <style>
            .contact-section {
                padding: 100px 0px 0px 0px;
            }
            .branch-section {
                padding: 0px 0px 100px 0px;
            }
        </style>

        <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1352.6546944621189!2d105.41700360024022!3d21.312212461505116!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f3da4ee0df67%3A0x5fa6e56b1b16bc88!2zTW9iaWZvbmUgUGjDuiBUaOG7jQ!5e0!3m2!1svi!2s!4v1696836043360!5m2!1svi!2s"
                            width="1248" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3716.959668970393!2d105.41410716532896!3d21.312609907107777!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f3b59d1746f7%3A0xcb2964dd35567dab!2zQ8O0bmcgdHkgZOG7i2NoIHbhu6UgTW9iaUZvbmUga2h1IHbhu7FjIDQ!5e0!3m2!1svi!2sus!4v1699407863885!5m2!1svi!2sus" width="1248" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Liên hệ với chúng tôi</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="{{ route('contactFormFrontEnd') }}" method="post"
                            id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập lời nhắn'" placeholder=" Nhập lời nhắn"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Nhập họ tên của bạn'"
                                            placeholder="Nhập họ tên của bạn">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập địa chỉ mail'"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="number_phone" id="number_phone" type="text"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nhập số điện thoại'"
                                            placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Gửi</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Mobifone Khu vực 4</h3>
                                <p>{{ $info_companies->address }}</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>Hotline </h3>
                                <p>{{ $info_companies->phone }}</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto: {{ $info_companies->email }}" class="__cf_email__"
                                        data-cfemail="b7c4c2c7c7d8c5c3f7d4d8dbd8c5dbded599d4d8da">Email</a>
                                </h3>
                                <p>{{ $info_companies->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-bottom: 2px solid #F15B43; width: 20%">

            </div>
        </section>

        <section class="branch-section">
            <div class="container">
                {{-- branch --}}

                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Các chi nhánh của chúng tôi</h2>
                    </div>
                    @foreach ($branches as $item)
                        <div class="col-xs-6 col-sm-6 col-md-4 branch_card">

                            <div class="branch_head">
                                <h3> {{ $item->name }} </h3>
                            </div>

                            <div class="branch_body limit-2-lines branch_border">
                                <p> <i class="fa fa-map-marker" aria-hidden="true" style="color:#F15B43"></i>&nbsp {{ $item->address }} </p>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
        </section>

    </main>
@endsection
