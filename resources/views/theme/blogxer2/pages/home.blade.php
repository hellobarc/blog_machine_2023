
@extends('theme.'.env('SITE_THEME').'.master')
@section('meta_tags')
@if($meta)
    <title>{{$meta['title']}} - {{env('SITE_URL', 'Site Name')}}</title>
    <meta name='description' itemprop='description' content='{{$meta['description']}}' />
    <?php $tags = implode(',', $meta['tags']); ?>
    <meta name='keywords' content='{{$tags}}' />
    <meta property='article:published_time' content='{{$meta['created_at']}}' />
    <meta property='article:section' content='event' />

    <meta property="og:description" content="{{$meta['description']}}" />
    <meta property="og:title" content="{{$meta['title']}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate" content="en-us" />
    <meta property="og:site_name" content="{{env('SITE_URL', 'Site Name')}}" />
    @foreach($meta['images'] as $image)
        <meta property="og:image" content="{{$image}}" />
    @endforeach

    <meta property="og:image:url" content="{{$meta['images'][0]}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{$meta['title']}}" />
    <meta name="twitter:site" content="@BlogMachine" />
@endif
@endsection

@section('content')
  <section class="slider-wrap-layout2">
	@include('theme/'.env('SITE_THEME').'/partials/slider')
  </section>
     <!-- Blog Area Start Here -->

        <section class="blog-wrap-layout1">
            <div class="container">
                <div class="row gutters-40">
                    @include('theme/'.env('SITE_THEME').'/partials/premium')
                </div>
            </div>
        </section>

        <!-- Blog Area End Here -->
        <!-- Blog Area Start Here -->
        <section class="blog-wrap-layout3">
            <div class="container">
                <div class="row gutters-40">
                    <div class="col-lg-8">
                        <div class="blog-box-layout1 text-left">
                            <div class="item-img">
                                <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog19.jpg')}}" alt="blog"></a>
                            </div>
                            <div class="item-content">
                                <ul class="entry-meta meta-color-dark">
                                    <li><i class="fas fa-tag"></i>Fashion</li>
                                    <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                    <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                                    <li><i class="far fa-clock"></i>5 Mins Read</li>
                                </ul>
                                <h2 class="item-title"> <a href="single-blog.html">5 design things to look out for in
                                        June 2019</a></h2>
                                <p>Aimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                    industry's standard dummy Lorem Ipsum has been the Lorem Ipsum has been the industry's
                                    standard dummy text ever since theindustry's
                                    standard dummy text ever since the text ever since the</p>
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="row gutters-20">
                            <div class="col-lg-4">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog20.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Travel</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">Styling Harvey Nichols</a></h3>
                                        <p>Erat volutpat Curabitur vene aties massa lacus tristique.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog21.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Style</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">Styling Harvey Nichols</a></h3>
                                        <p>Erat volutpat Curabitur vene aties massa lacus tristique.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog22.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Receipe</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">Styling Harvey Nichols</a></h3>
                                        <p>Erat volutpat Curabitur vene aties massa lacus tristique.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-40">
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog23.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Travel</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog24.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Music</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog25.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Travel</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog26.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Life Style</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog27.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Fashion</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog28.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Fashion</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog25.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Travel</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-box-layout1 text-left">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog26.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Life Style</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"> <a href="single-blog.html">The Perfect hairey solutions</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
                                            aewnon auctor nislerty
                                            sodales iquam erat volutpat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-layout1">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">FOLLOW ME ON</h3>
                            </div>
                            <div class="widget-follow-us-2">
                                <ul>
                                    <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-twitter"></i>52K FOLLOWERS</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-instagram"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-youtube"></i>SUBSCRIBE NOW</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-post-tab">
                                <ul class="nav nav-tabs tab-nav-list">
                                    <li class="nav-item">
                                        <a class="active" href="#related1" data-toggle="tab" aria-expanded="false">TRENDING</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#related2" data-toggle="tab" aria-expanded="false">POPULAR</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="related1">
                                        <ul class="post-list">
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog30.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">Thought aful
                                                            Living result
                                                            are aert aos Angeles</a></h4>
                                                </div>
                                            </li>
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog31.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">Type designer
                                                            Jeremy Tanka
                                                            rdoverhauls online</a></h4>
                                                </div>
                                            </li>
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog32.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">5 design things
                                                            to look out for
                                                            in June 2019</a></h4>
                                                </div>
                                            </li>
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog33.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">Marc Falzone
                                                            opens £2 million
                                                            UK Expo Pavilion</a></h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="related2">
                                        <ul class="post-list">
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog32.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">5 design things
                                                            to look out for
                                                            in June 2019</a></h4>
                                                </div>
                                            </li>
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog33.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">Marc Falzone
                                                            opens £2 million
                                                            UK Expo Pavilion</a></h4>
                                                </div>
                                            </li>
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog30.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">Thought aful
                                                            Living result
                                                            are aert aos Angeles</a></h4>
                                                </div>
                                            </li>
                                            <li class="post-item">
                                                <div class="item-img">
                                                    <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog31.jpg')}}" alt="Post"></a>
                                                </div>
                                                <div class="item-content">
                                                    <ul class="entry-meta meta-color-dark">
                                                        <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                                    </ul>
                                                    <h4 class="item-title"><a href="single-blog.html">Type designer
                                                            Jeremy Tanka
                                                            rdoverhauls online</a></h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="{{asset('theme/default/img/figure/figure2.jpg')}}" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">CATEGORIES</h3>
                            </div>
                            <div class="widget-categories-2">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <h4 class="item-title">Travel</h4>
                                            <span class="item-subtitle">20 Posts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h4 class="item-title">Food</h4>
                                            <span class="item-subtitle">55 Posts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h4 class="item-title">Beauty &amp; Spa</h4>
                                            <span class="item-subtitle">30 Posts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h4 class="item-title">Fashion</h4>
                                            <span class="item-subtitle">15 Posts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h4 class="item-title">Style</h4>
                                            <span class="item-subtitle">20 Posts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h4 class="item-title">Technology</h4>
                                            <span class="item-subtitle">66 Posts</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">NEWSLETTER SUBSCRIBER</h3>
                            </div>
                            <div class="widget-newsletter-subscribe-2">
                                <form class="subscribe-form">
                                    <div class="input-group stylish-input-group">
                                        <input type="text" class="form-control" placeholder="Type your E-mail . . .">
                                        <span class="input-group-addon">
                                            <button type="submit">SUBMIT
                                                <span class="fas fa-angle-right" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">FEATURED POSTS</h3>
                            </div>
                            <div class="widget-featured-post">
                                <div class="featured-post-box-1">
                                    <div class="item-img">
                                        <img src="{{asset('theme/default/img/blog/blog29.jpg')}}" alt="Blog Post">
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Food</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h4 class="item-title">
                                            <a href="single-blog.html">Falzone opens support UK Expo Pavilion</a>
                                        </h4>
                                        <p>Aliquam erat volutpat. Curabitur vene natiareset
                                            massa secus tristique.</p>
                                    </div>
                                </div>
                                <div class="featured-post-box-2">
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Tech</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h4 class="item-title">
                                            <a href="single-blog.html">Falzone opens support UK Expo Pavilion</a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="featured-post-box-2">
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Style</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h4 class="item-title">
                                            <a href="single-blog.html">Falzone opens support UK Expo Pavilion</a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="featured-post-box-2">
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Tech</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h4 class="item-title">
                                            <a href="single-blog.html">Falzone opens support UK Expo Pavilion</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->

@endsection
