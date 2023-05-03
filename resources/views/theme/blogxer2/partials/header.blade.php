 <!-- Header Area Start Here -->
        <header class="has-mobile-menu">
            <div id="header-middlebar" class="pt--29 pb--29 bg--dark">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-4">
                            <div class="header-action-items">
                                <ul>
                                    @foreach ($social_setting as $social)
                                    <li class="item-social-layout2"> <a href="{{$social->social_url}}" target="_blank"><i class="{{$social->social_icon}}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center">
                            <div class="logo-area">
                                <a href="https://ielts.live/" class="temp-logo" id="temp-logo">
                                    <img src="{{asset('uploads/site_setting/logo.png')}}" alt="{{env('SITE_NAME')}}" class="img-fluid" width="50px">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-end">
                            <div class="header-action-items">
                                <ul>
                                    <li class="header-search-box divider-style-border">
                                        <a href="#header-search" title="Search">
                                            <i class="flaticon-magnifying-glass"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="rt-sticky-placeholder"></div>
            <div id="header-menu" class="header-menu menu-layout1 bg--light">
                 @include('theme/'.env('SITE_THEME').'/partials/navigation')
            </div>
        </header>
        <!-- Header Area End Here -->
