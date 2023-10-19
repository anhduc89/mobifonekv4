@extends('frontEnd.layouts.frontend')

@section('title')
    <title>Liên hệ | Mobifone Khu Vực 4</title>
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
            <div class="slider-height2 slider-bg2 d-flex hero-overly align-items-center">
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



        <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div id="map" style="height: 480px; position: relative; overflow: hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1352.6546944621189!2d105.41700360024022!3d21.312212461505116!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f3da4ee0df67%3A0x5fa6e56b1b16bc88!2zTW9iaWZvbmUgUGjDuiBUaOG7jQ!5e0!3m2!1svi!2s!4v1696836043360!5m2!1svi!2s"
                            width="1248" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

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
                    <div class="col-lg-3 offset-lg-1">
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
                                <h3>{{ $info_companies->phone }}</h3>
                                <p>Thứ 2 đến thứ 6 giờ hành chính</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto: {{ $info_companies->email }}" class="__cf_email__"
                                        data-cfemail="b7c4c2c7c7d8c5c3f7d4d8dbd8c5dbded599d4d8da">[Email:]</a>
                                </h3>
                                <p>{{ $info_companies->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
