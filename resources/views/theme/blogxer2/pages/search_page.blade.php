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
        <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>{{$category->cat_name}}</h1>
                            <ul>
                                <li>
                                    <a href="{{route('homepage')}}">Home</a>
                                </li>
                                <li>{{$category->cat_name}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Blog Area Start Here -->
        <section class="blog-wrap-layout23">
            <div class="container">
                <div class="row gutters-50">
                    <div class="col-lg-8">
                        <div class="blog-box-layout3">
                            <div class="item-img">
                                <img src="{{asset('theme/default/img/blog/blog159.jpg')}}" alt="blog">
                                <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                    <i class="flaticon-play-arrow"></i>
                                </a>
                            </div>
                            <div class="item-content">
                                <ul class="entry-meta meta-color-dark">
                                    <li><i class="fas fa-tag"></i>Racing</li>
                                    <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                    <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                                    <li><i class="far fa-clock"></i>5 Mins Read</li>
                                </ul>
                                <h2 class="item-title"><a href="single-blog.html">Car racing design things to look out for in June 2019</a></h2>
                                <p>Aimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since thetioned it, you probably perfectly understand
                                why it is important for the payment process to go as smoothly as possi to go through a million
                                or email campaigns each. </p>
                                <div class="action-area">
                                    <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                    <ul class="response-area">
                                        <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                        <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters-40" id="no-equal-gallery">
                            <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog160.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Clinic</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog161.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Samurai</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog162.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Fighter</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="img/blog/blog163.jpg" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Animation</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog164.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Fighter</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog165.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Action</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog166.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Animation</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6 no-equal-item">
                                <div class="blog-box-layout3">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog167.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Racing</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Inside the new battle for the neaa  American West</a></h3>
                                        <p>Aliquam erat volutpat. Curabitur venenatis massa sed lacus tristique, non auctor nisl sodales.
                                            I brought up something as practical boring.</p>
                                        <div class="action-area">
                                            <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                            <ul class="response-area">
                                                <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                                <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                            </ul>
                                        </div>
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
                                <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
                            </div>
                            <div class="widget-follow-us">
                                <ul>
                                    <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-github-alt"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-kickstarter-k"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">ABOUT ME</h3>
                            </div>
                            <div class="widget-about">
                                <figure class="author-figure"><img src="{{asset('theme/default/img/figure/figure9.jpg')}}" alt="about"></figure>
                                <figure class="author-signature"><img src="img/figure/signature.png" alt="about"></figure>
                                <p>Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor pibus
                                    doloer.</p>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-newsletter-subscribe-dark">
                                <h3>GET LATEST UPDATES</h3>
                                <p>NEWSLETTER SUBSCRIBE</p>
                                <form class="newsletter-subscribe-form">
                                    <div class="form-group">
                                        <input type="text" placeholder="your e-mail address" class="form-control" name="email"
                                            data-error="E-mail field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group mb-none">
                                        <button type="submit" class="item-btn">SUBSCRIBE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">POPULAR POSTS</h3>
                            </div>
                            <div class="widget-popular">
                                <div class="post-box">
                                    <div class="item-img">
                                        <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog156.jpg')}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Finance</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Thought Living area tecnology with aert aos Angeles</a></h3>
                                    </div>
                                </div>
                                <div class="post-box">
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>Business</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Thought Living area tecnology with aert aos Angeles</a></h3>
                                    </div>
                                </div>
                                <div class="post-box">
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>It</li>
                                            <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                        </ul>
                                        <h3 class="item-title"><a href="single-blog.html">Thought Living area tecnology with aert aos Angeles</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="{{asset('theme/default/img/figure/figure5.jpg')}}" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">CATEGORIES</h3>
                            </div>
                            <div class="widget-categories">
                                <ul>
                                    <li>
                                        <a href="#">Beauty
                                            <span>(35)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Fashion
                                            <span>(10)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Food
                                            <span>(25)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style
                                            <span>(15)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Travel
                                            <span>(22)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Video
                                            <span>(18)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Technology
                                            <span>(22)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">INSTAGRAM</h3>
                            </div>
                            <div class="widget-instagram">
                                <ul>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure30.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure31.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure32.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure33.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure34.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure35.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure36.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure37.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure38.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
@endsection
