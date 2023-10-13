<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">MOBIFONE KV4</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
                {{ session('email') }}
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>&nbsp
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-header">----- NỘI DUNG WEBSITE</li>
                <!-- Tin tức - bài viết -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                       <i class="nav-icon fas fa-copy"></i>&nbsp
                        <p> Tin bài
                            <i class="fas fa-angle-left right"></i>&nbsp
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('newsCategories.index') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="nav-icon fas fa-th"></i>
                                <p>Danh mục tin bài</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('news.index') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class=" nav-icon fas fa-pencil-alt"></i>&nbsp
                                <p>Viết tin mới </p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Sản phẩm dịch vụ -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Sản phẩm - dịch vụ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('productCategories.index') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="far fa-circle nav-icon"></i>
                                <p>Loại danh mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="far fa-circle nav-icon"></i>
                                <p>Sản phẩm - dịch vụ</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Hình ảnh -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p> Hình ảnh
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('image.index') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="nav-icon fas fa-photo-video"></i>
                                <p> Slider + Gallery </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="nav-icon fas fa-image"></i>
                                <p>Hình ảnh công ty</p>
                            </a>
                        </li> --}}

                    </ul>
                </li>

                <!-- Tuyển dụng -->
                <li class="nav-header">----- TUYỂN DỤNG </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p> Tuyển dụng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('recruitment.index') }}" class="nav-link">
                            &nbsp&nbsp&nbsp&nbsp<i class="nav-icon far fa-newspaper"></i>&nbsp
                            <p>Tin tuyển dụng </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('recruitment.index') }}" class="nav-link">
                            &nbsp&nbsp&nbsp&nbsp<i class="nav-icon far fa-paper-plane"></i>&nbsp
                            <p>Ứng viên liên hệ </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- Landing page -->
                <li class="nav-header">----- LANDING PAGE</li>
                <li class="nav-item">
                    <a href="{{ route('landingpage.index') }}" class="nav-link">
                        <i class="far fa-file-word"></i>&nbsp
                        <p>Landing page </p>
                    </a>
                </li>


                <!-- khách hàng liên hệ (qua email và landing page)-->
                <li class="nav-header">----- KHÁCH HÀNG LIÊN HỆ</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>&nbsp
                        <p> Nội dung liên hệ
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="far fa-circle nav-icon"></i>
                                <p>Liên hệ mới</p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="far fa-circle nav-icon"></i>
                                <p>Không thành công</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="far fa-circle nav-icon"></i>
                                <p>Liên hệ thành công</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>

                <li class="nav-header">----- THÔNG TIN CÔNG TY</li>
                <!-- THÔNG TIN CÔNG TY -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info"></i><p>Thông tin <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('infoCompany.aboutus') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="nav-icon fas fa-users"></i>
                                <p>Về chúng tôi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('infoCompany.infor') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="nav-icon fas fa-address-card"></i>
                                <p>Thông tin liên hệ</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('infoCompany.socialNetwork') }}" class="nav-link">
                                &nbsp&nbsp&nbsp&nbsp<i class="nav-icon fas fa-share-alt"></i>
                                <p>Mạng xã hội</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <!-- Cài đặt - tùy chỉnh website-->
                <li class="nav-header">----- CÀI ĐẶT CHUNG</li>
                <li class="nav-item">
                    <a href="{{ route('menus.index') }}" class="nav-link">
                        <i class="fas fa-ellipsis-v"></i>&nbsp
                        <p> Menu website </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p> Thoát </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
