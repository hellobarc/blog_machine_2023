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
         <!-- Single Blog Banner Start Here -->
         <section class="single-blog-wrap-layout1">
            <div class="single-blog-banner-layout1">
                <div class="banner-img">
                    <img src="img/blog/blog208.jpg" alt="blog">
                </div>
                <div class="banner-content">
                    <div class="container">
                        <ul class="entry-meta meta-color-light2">
                            <li><i class="fas fa-tag"></i>Travel</li>
                            <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                            <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                            <li><i class="far fa-clock"></i>5 Mins Read</li>
                        </ul>
                        <h2 class="item-title">when an unknown printer took a gallery of type Work 2019</h2>
                        <ul class="item-social">
                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i>SHARE</a></li>
                            <li><a href="#" class="twitter"><i class="fab fa-twitter"></i>SHARE</a></li>
                            <li><a href="#" class="g-plus"><i class="fab fa-google-plus-g"></i>SHARE</a></li>
                            <li><a href="#" class="pinterst"><i class="fab fa-pinterest"></i>PIN IT</a></li>
                            <li><a href="#" class="load-more"><i class="fas fa-plus"></i>MORE</a></li>
                        </ul>
                        <ul class="response-area">
                            <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                            <li><a href="#"><i class="far fa-eye"></i>105</a></li>
                            <li><a href="#"><i class="far fa-heart"></i>225</a></li>
                            <li><a href="#"><i class="fas fa-share"></i>302</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row gutters-50">
                    <div class="col-lg-8">
                        <div class="single-blog-box-layout1">
                            <div class="blog-details">
                                <p>Borem ipsum dolor sit amet, adhuc iriure dissentias est in,
                                    est ne diam graece tincidunt. Sit et liber minimuam
                                    tsea no doctus fastidii.An molestiae definiebas mel.
                                    Quo everti vituperata et, quo cu omnis maiorum aetaea
                                    fierentlaboramus eum.Nam at dicant deterruisset. Nam at
                                    nulla choro denique, et cum quando definitionem. Sea te
                                    nisl splendide, odio timeam an vim. Quas brute aliquam id per,
                                    et natum vocent eripuit sea. No mea feugiat ara aeat nusquam
                                    ocurreret Quo everti vituperata etquo cu omnis maiorum aetaea. </p>
                                <p>Borem ipsum dolor sit amet, adhuc iriure dissentias est in, est
                                    ne diam graece tincidunt. Sit et liber minimum tacimates, sea no
                                    doctus fastidii.An molestiae definiebas mel. Quo everti vituperata
                                    et, quo cu omnis maiorum.soluta fierentlaboramus eum.Nam at dicant
                                    deterruisset.</p>
                                <blockquote>Borem ipsum dolor sit amet, adhuc iriure dissentias est in,
                                    est ne diam graece tincidunt. Sit et liber minimum tacimates, sea no docAas
                                    mela mine.
                                    <span class="qoute-subtitle">STEVEN WILLY</span>
                                </blockquote>
                                <p>Equidem impedit officiis quo te. Illud partem sententiae mel eu, euripidis
                                    urbanitas et sit. Mediocrem reprimique an vim, veniam tibique omittantur
                                    duo ut, agam graeci in vim. Quot appetere patrioque te mea, animal aliquip
                                    te pri. Ad vis animal ceteros percipitur, eos tollit civibus percipitur no.
                                    Posse definiebas dissentiunt mel ea, nam ferri utroque invenire an. Ius te
                                    iuvaret offendit pertinax, his verear deseruisse ex. Illud elitr eam eu. Id usu
                                    putant commune, stet primis expetenda cu vel. Mea ipsum homero apeirian te.
                                    Accumsan similique instructior ad pro, te purto dicit qui. Qui ex putent suavitate
                                    adolescens, his possim tamquam fuisset.</p>
                                <div class="row gutters-20">
                                    <div class="col-sm-6 col-12">
                                        <div class="single-img">
                                            <img src="img/blog/blog209.jpg" alt="blog">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="single-img">
                                            <img src="img/blog/blog210.jpg" alt="blog">
                                        </div>
                                    </div>
                                </div>
                                <p>Equidem impedit officiis quo te. Illud partem sententiae mel eu,
                                    euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam
                                    tibique omittantur duo ut, agam graeci in vim. Quot appetere patrioque
                                    te mea, animal aliquip te pri. Ad vis animal ceteros percipitur,
                                    eos tollit civibus percipitur no</p>
                                <div class="more-info">
                                    <h2 class="item-title">Discover Travel Innovation 2019</h2>
                                    <p>Aeuidem impedit officiis quo te. Illud partem sententiae mel eu,
                                        euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam tibique
                                        omittantur duo ut, agam graeci in vim. Quot appetere patrioque te mea,
                                        animal aliquip te pri. Ad vis animal ceteros percipitur, eos tollit civibus
                                        percipitur.</p>
                                    <ol class="info-list">
                                        <li>The feedback provided by a system is not very informative. It’s not clear
                                            how a system
                                            request or what exactly happens with the information.</li>
                                        <li>The feedback provided by a system is not very informative. It’s not clear
                                            how a system
                                            request or what exactly happens with the information.</li>
                                        <li>The feedback provided by a system is not very informative. It’s not clear
                                            how a system
                                            request or what exactly happens with the information.</li>
                                    </ol>
                                    <p>Muidem impedit officiis quo te. Illud partem sententiae mel eu, euripidis
                                        urbanitas et sit.
                                        Mediocrem reprimique an vim, veniam tibique omittantur duo ut, agam graeci in
                                        vim.</p>
                                </div>
                                <div class="single-slider">
                                    <div class="rc-carousel nav-control-layout9" data-loop="true" data-items="30"
                                        data-margin="20" data-autoplay="false" data-autoplay-timeout="5000"
                                        data-smart-speed="700" data-dots="false" data-nav="true" data-nav-speed="false"
                                        data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false"
                                        data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                                        data-r-small="1" data-r-small-nav="true" data-r-small-dots="false"
                                        data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false"
                                        data-r-large="1" data-r-large-nav="true" data-r-large-dots="false"
                                        data-r-extra-large="1" data-r-extra-large-nav="true" data-r-extra-large-dots="false">
                                        <div class="single-slider-box">
                                            <div class="item-img">
                                                <img src="img/blog/blog211.jpg" alt="slider">
                                            </div>
                                        </div>
                                        <div class="single-slider-box">
                                            <div class="item-img">
                                                <img src="img/blog/blog211.jpg" alt="slider">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="more-info">
                                    <h2 class="item-title">Discover Travel Innovation 2019</h2>
                                    <p>Equidem impedit officiis quo te. Illud partem sententiae mel eu,
                                        euripidis urbanitas et sit. Mediocrem reprimique an vim, veniam
                                        tibique omittantur duo ut, agam graeci in vim. Quot appetere
                                        patrioque te mea, animal aliquip te pri. Ad vis animal ceteros
                                        percipitur, eos tollit civibus percipitur noLorem ipsum proin
                                        gravida nibh vel velit auctor aliquet. Aenean sollicitudin,
                                        lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis
                                        sem nibh id elit.Duis sed odio sit amet nibh vulputate cursus a
                                        sit amet mauris.</p>
                                </div>
                            </div>
                            <div class="blog-entry-meta">
                                <ul>
                                    <li class="item-tag"><i class="fas fa-bookmark"></i>
                                        <a href="#">explore,</a>
                                        <a href="#">travel,</a>
                                        <a href="#">vacation,</a>
                                    </li>
                                    <li class="item-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                        <a href="#"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="item-respons"><i class="fas fa-heart"></i>1,230</li>
                                </ul>
                            </div>
                            <div class="blog-author">
                                <div class="media media-none--xs">
                                    <img src="img/blog/blog212.jpg" alt="Author" class="media-img-auto">
                                    <div class="media-body">
                                        <h4 class="item-title">Lora Zaman</h4>
                                        <div class="item-subtitle">Author</div>
                                        <p>Dorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit,sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
                                        <ul class="item-social">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="related-item">
                                <div class="section-heading-4 heading-dark">
                                    <h3 class="item-heading">YOU MAY ALSO LIKE</h3>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 col-12">
                                        <div class="blog-box-layout1 text-left">
                                            <div class="item-img">
                                                <a href="single-blog.html"><img src="img/blog/blog213.jpg" alt="blog"></a>
                                            </div>
                                            <div class="item-content">
                                                <ul class="entry-meta meta-color-dark">
                                                    <li><i class="fas fa-tag"></i>Fashion</li>
                                                    <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                                                </ul>
                                                <h5 class="item-title"><a href="single-blog.html">How an Island Formsn
                                                        River
                                                        And Stones</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="blog-box-layout1 text-left">
                                            <div class="item-img">
                                                <a href="single-blog.html"><img src="img/blog/blog214.jpg" alt="blog"></a>
                                            </div>
                                            <div class="item-content">
                                                <ul class="entry-meta meta-color-dark">
                                                    <li><i class="fas fa-tag"></i>Fashion</li>
                                                    <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                                                </ul>
                                                <h5 class="item-title"><a href="single-blog.html">How an Island Formsn
                                                        River
                                                        And Stones</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-12">
                                        <div class="blog-box-layout1 text-left">
                                            <div class="item-img">
                                                <a href="single-blog.html"><img src="img/blog/blog215.jpg" alt="blog"></a>
                                            </div>
                                            <div class="item-content">
                                                <ul class="entry-meta meta-color-dark">
                                                    <li><i class="fas fa-tag"></i>Fashion</li>
                                                    <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                                                </ul>
                                                <h5 class="item-title"><a href="single-blog.html">How an Island Formsn
                                                        River
                                                        And Stones</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-comment">
                                <div class="section-heading-4 heading-dark">
                                    <h3 class="item-heading">02 COMMENTS</h3>
                                </div>
                                <div class="media media-none--xs">
                                    <img src="img/blog/blog216.jpg" alt="Blog Comments" class="img-fluid media-img-auto">
                                    <div class="media-body">
                                        <h4 class="item-title">Jack Sparrow</h4>
                                        <div class="item-subtitle">2 Mins Ago</div>
                                        <p>Bmmy text of the printing and typesetting industryorem Ipsum
                                            has been the industry's standard dummy text ever since the</p>
                                        <a href="#" class="item-btn">Reply</a>
                                    </div>
                                </div>
                                <div class="media media-none--xs">
                                    <img src="img/blog/blog217.jpg" alt="Blog Comments" class="img-fluid media-img-auto">
                                    <div class="media-body">
                                        <h4 class="item-title">Dakcon Nitiya</h4>
                                        <div class="item-subtitle">2 Mins Ago</div>
                                        <p>Bmmy text of the printing and typesetting industryorem Ipsum has
                                            been the industry's standard dummy text ever since the</p>
                                        <a href="#" class="item-btn">Reply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-form">
                                <div class="section-heading-4 heading-dark">
                                    <h3 class="item-heading">WRITE A COMMENT</h3>
                                </div>
                                <form class="contact-form-box">
                                    <div class="row gutters-15">
                                        <div class="col-md-4 form-group">
                                            <input type="text" placeholder="Name*" class="form-control" name="first_name"
                                                data-error="Name field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="email" placeholder="E-mail*" class="form-control" name="email"
                                                data-error="E-mail field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input type="text" placeholder="Website*" class="form-control" name="website"
                                                data-error="website field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea placeholder="Write your comments ..." class="textarea form-control"
                                                name="message" rows="8" cols="20" data-error="Message field is required"
                                                required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <button class="item-btn">POST COMMENT</button>
                                        </div>
                                    </div>
                                    <div class="form-response"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">POPULAR POSTS</h3>
                            </div>
                            <div class="widget-latest">
                                <ul class="block-list">
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="img/blog/blog85.jpg" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Weeding</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">Thought aful Living result are aert aos
                                                    Angeles</a></h4>
                                        </div>
                                    </li>
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="img/blog/blog86.jpg" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Flower</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">Type designer Jeremy Tanka rdoverhauls
                                                    online</a></h4>
                                        </div>
                                    </li>
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="img/blog/blog87.jpg" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Stage</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">5 design things to look out for in June
                                                    2019</a></h4>
                                        </div>
                                    </li>
                                    <li class="single-item">
                                        <div class="item-img">
                                            <a href="#"><img src="img/blog/blog88.jpg" alt="Post"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>Life Style</li>
                                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                            </ul>
                                            <h4 class="item-title"><a href="#">Marc Falzone opens £2 million UK Expo
                                                    Pavilion</a></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">FOLLOW ME ON</h3>
                            </div>
                            <div class="widget-follow-us-2">
                                <ul>
                                    <li class="single-item"><a href="#"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-twitter"></i>FOLLOWE ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-instagram"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-linkedin-in"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-pinterest-p"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-youtube"></i>SUBSCRIBE</a></li>
                                </ul>
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
                            <div class="widget-ad">
                                <a href="#"><img src="img/figure/figure5.jpg" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single Blog Banner End Here -->
@endsection
