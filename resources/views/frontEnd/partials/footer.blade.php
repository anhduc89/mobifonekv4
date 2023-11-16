@php

    // Lấy thông tin công ty
    $info_companies = session()->get('frontend')['info_companies'];

@endphp


<footer>
    <div class="footer-wrapper gray-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-20">
                                <div class="footer-logo mb-35">
                                    <a href=""><img src="{{ $info->image_logo_path }}" alt="Mobifone"
                                            width="100%"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-8 col-sm-10">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle mb-10">
                                <h4>Công ty Dịch vụ MobiFone khu vực 4</h4>
                                <p> <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp Tòa nhà MobiFone - Khu Đồng
                                    Mạ - P. Tiên Cát - TP Việt Trì - T. Phú Thọ</p>
                            </div>
                            <div class="footer-tittle">
                                <h4>Kết nối với chúng tôi</h4>
                            </div>
                            {{-- <div class="footer-form mb-20">
                                <div id="mc_embed_signup">
                                    <form target="_blank"
                                        action="#"
                                        method="get" class="subscribe_form relative mail_part">
                                        <input type="email" name="email" id="newsletter-form-email"
                                            placeholder="Nhập email của bạn" class="placeholder hide-on-focus">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit"
                                                class="email_icon newsletter-submit button-contactForm">
                                                <img src="{{ asset( 'frontEnd/img/icon/Icon-send.svg') }}" alt>
                                            </button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div> --}}

                            <div class="footer-social mt-30">
                                <a href="tel:{{ $info->phone }}" title="Hostline" target="_blank"><i
                                        class="fas fa-phone-alt"></i></a>
                                <a href="mailto:{{ $info->email }}" title="Email" target="_blank"><i
                                        class="fas fa-envelope"></i></a>
                                <a href="{{ $info->facebook }}" title="Facebook" target="_blank"><i
                                        class="fab fa-facebook-square"></i></a>
                                <a href="{{ $info->tiktok }}" title="Tiktok" target="_blank"><i
                                        class="fab fa-tiktok"></i></a>
                                <a href="{{ $info->zalo }}" title="Zalo" target="_blank"><i
                                        class="fas fa-sms"></i></a>
                                <a href="{{ $info->youtube }}" title="Youtube" target="_blank"><i
                                        class="fab fa-youtube-square"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Giới thiệu</h4>
                                <ul>
                                    <li><a href="https://www.mobifone.vn/gioi-thieu" target="_blank">Giới thiệu MobiFone</a></li>
                                    <li><a href="https://www.mobifone.vn/gioi-thieu/hop-tac-voi-mobifone" target="_blank">Hợp tác MobiFone</a></li>
                                    <li><a href="/tuyen-dung">Tuyển dụng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Hỗ trợ khách hàng</h4>
                                <ul>
                                    <li><a href="/lien-he">Gửi phản ánh </a></li>
                                    <li><a href="https://www.mobifone.vn/ho-tro-khach-hang/cau-hoi-thuong-gap" target="_blank">Câu hỏi thường gặp</a></li>
                                    <li><a href="/lien-he">Tìm kiếm cửa hàng</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p> Bản quyền &copy;

                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> Công ty Dịch vụ MobiFone khu vực 4
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
