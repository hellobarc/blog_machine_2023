<header class="has-mobile-menu">
    <div id="rt-sticky-placeholder"></div>
    <div id="header-menu" class="header-menu menu-layout2 bg--dark2">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="{{route('homepage')}}" class="temp-logo" id="temp-logo" >
                            <img src="{{asset('theme/default/img/logo-light.png')}}" alt="{{env('SITE_THEME')}}" class="img-fluid" width="50px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-flex justify-content-end">
                    @include('theme/default/partials/navigation')
                </div>
                <div class="col-lg-2 d-flex justify-content-end">
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
</header>

