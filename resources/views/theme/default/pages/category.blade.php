@extends('theme.default.master')

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
    <section class="inner-page-banner bg-common">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs-area">
                        <h1>{{$category->cat_name}}</h1>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>{{$category->cat_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <!-- Blog Area Start Here -->
      <section class="blog-wrap-layout21">
        <div class="container">
            <div class="row gutters-40">
                @empty(!$featured_post)
                    @foreach($featured_post->take(4) as $post)
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="blog-box-layout9">
                            <div class="item-img">
                                <a href="single-blog.html"><img src="{{asset('uploads/article/thumbnail/')}}{{$post->thumbnail}}" alt="{{$post->title}}"></a>
                            </div>
                            <div class="item-content">
                                <ul class="entry-meta meta-color-dark">
                                    <li><i class="fas fa-tag"></i>{{$post->category->cat_name}}</li>
                                    <li><i class="fas fa-calendar-alt"></i>{{($post->created_at)->diffForHumans()}}</li>
                                </ul>
                                <h3 class="item-title"><a href="single-blog.html">{{$post->title}}<</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endempty
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
    <!-- Blog Area Start Here -->
    <section class="blog-wrap-layout22">
        <div class="container">
            <div class="row gutters-50">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog149.jpg')}}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Business</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019  to ship in January</a></h3>
                            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen deary deary dolor vitae eleifen deary deary mattis sem.</p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog151.jpg')}}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Finance</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019  to ship in January</a></h3>
                            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen deary dolor vitae eleifen deary deary deary mattis sem.</p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog152.jpg')}}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Finance</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019  to ship in January</a></h3>
                            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen deary dolor vitae eleifen deary deary deary mattis sem.</p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog153.jpg')}}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Finance</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019  to ship in January</a></h3>
                            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen dolor vitae eleifen deary deary deary deary mattis sem.</p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog154.jpg')}}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Finance</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019  to ship in January</a></h3>
                            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen deary dolor vitae eleifen deary deary deary mattis sem.</p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog155.jpg')}}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Finance</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019  to ship in January</a></h3>
                            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen deary dolor vitae eleifen deary deary deary mattis sem.</p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-box-layout4">
                        <div class="item-img">
                            <a href="single-blog.html"><img src="{{asset('theme/default/img/blog/blog158.jpg')}}" alt="blog"></a>
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>Finance</li>
                                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                                <li><i class="far fa-clock"></i>5 Mins Read</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019  to ship in January</a></h3>
                            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen deary dolor vitae eleifen deary deary deary mattis sem.</p>
                            <div class="action-area">
                                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                <ul class="response-area">
                                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                                </ul>
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
                <div class="col-xl-3 col-lg-4 sidebar-widget-area sidebar-break-md">
                    @include('theme/default/partials/home_sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End Here -->
@endsection
