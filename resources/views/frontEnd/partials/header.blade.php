@php
    
    $menus = DB::table('menus')->get();

@endphp 

<header>
    <div class="header-area">
        <div class="header-bottom  header-sticky">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between flex-wrap position-relative">

                    <div class="left-side d-flex align-items-center">
                        <div class="logo">
                            <a href=""><img src="{{ asset( 'frontEnd/img/logo/logo1.png ') }}" alt='Mobifone'></a>
                        </div>

                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    @foreach ($menus as $key => $item)
                                        @if ( $item -> parent_id == 0)
                                            <li><a href="{{ $item -> slug_name }}"> {{ $item -> name }} </a>
                                                
                                                @php

                                                    $count = 0;
                                                    $submenu = '';
                                                @endphp

                                                @foreach ($menus as $key1 => $itemSubmenu)
                                                
                                                @php

                                                    if ( $itemSubmenu -> parent_id != 0 && $item -> id == $itemSubmenu -> parent_id ){
                                                        
                                                        $submenu .= '<li><a href="' . $itemSubmenu -> slug_name .'"> '. $itemSubmenu -> name .' </a></li>';

                                                        $count ++;

                                                        unset($menus[$key1]);

                                                    }

                                                @endphp
                    
                                                @endforeach

                                                @if ($count > 0)

                                                    <ul class="submenu">    
                                                        @php
                                                            echo $submenu;
                                                        @endphp
                                                    </ul>

                                                @endif

                                            </li>
                                            @php
                                                unset($menus[$key]);
                                            @endphp
                                        @endif

                                       
                                    @endforeach

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right-btn d-flex f-right align-items-center">
                        {{-- <a  class="header-btn2 d-none d-xl-inline-block">Liên Hệ : <span> 0 (89) 9 838 838</span></a> --}}
                        <ul class="header-social d-none d-sm-block">
                           
                            <li><a href="https://www.facebook.com/mobifonekv4.vn" title="Facebook" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="https://www.tiktok.com/@mobifonekv4" title="Tiktok"  target="_blank"><i class="fab fa-tiktok"></i></a></li>
                            <li> <a href="https://zalo.me/626767492003379900?gidzl=pAGh9RQ-XN3Clo8gkwECSyAwBosZy8XqZRju8FEXt7sFjoWZyQtRUeYxVNJnh8qksxLvTJbFBvPiihk9Vm" title="Zalo"  target="_blank"><i class="fas fa-sms"></i></a></li>
                            <li> <a href="https://www.youtube.com/channel/UCOsP75SL3f-EM7z4eylRbJQ" title="Youtube"  target="_blank"><i class="fab fa-youtube-square"></i></a></li>
                            <li><a href="tel:0899.838.838" title="Hostline" target="_blank"><i class="fas fa-phone-alt"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
