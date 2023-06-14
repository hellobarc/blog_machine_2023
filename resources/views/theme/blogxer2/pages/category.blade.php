@extends('theme.'.env('SITE_THEME').'.master')

@section('meta_tags')
@if($meta)
    <title>{{$meta['title']}}</title>
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
                                    <a href="{{route('home_page')}}">Home</a>
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
                        @foreach ($latestCategoryArticle as $rows)
                            <div class="blog-box-layout3">
                                <div class="item-img">
                                    <img src="{{asset('uploads/article/thumbnail/'.$rows->thumbnail)}}" alt="blog">
                                    {{-- <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                        <i class="flaticon-play-arrow"></i> --}}
                                    </a>
                                </div>
                                <div class="item-content">
                                    <ul class="entry-meta meta-color-dark">
                                        <li><i class="fas fa-tag"></i>{{Helper::tag_name($rows->tags)}}</li>
                                        <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($rows->custom_date)}}</li>
                                        <li><i class="fas fa-user"></i>BY <a href="#">{{$rows->author->author_name}}</a></li>
                                        <li><i class="far fa-clock"></i>{{$rows->read_minutes}} Mins Read</li>
                                    </ul>
                                    <h2 class="item-title"><a href="{{route('detail_page',['id'=>$rows->id,'slug'=>Str::slug($rows->title,'-')])}}">{{$rows->title}}</a></h2>
                                    <p>{{$rows->meta_description}}</p>
                                    <div class="action-area">
                                        <a href="{{route('detail_page',['id'=>$rows->id,'slug'=>Str::slug($rows->title,'-')])}}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                        <ul class="response-area">
                                            <li><a href="#"><i class="far fa-heart"></i>{{Helper::count_likes($rows->id)}}</a></li>
                                            <li><a href="#"><i class="far fa-comment"></i>{{Helper::count_comments($rows->id)}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row gutters-40" id="no-equal-gallery">
                            @foreach ($categoriesArticle as $cat_article)
                                <div class="col-sm-6 no-equal-item">
                                    <div class="blog-box-layout3">
                                        <div class="item-img">
                                            <a href="{{route('detail_page',['id'=>$cat_article->id,'slug'=>Str::slug($cat_article->title,'-')])}}"><img src="{{asset('uploads/article/thumbnail/'.$cat_article->thumbnail)}}" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{Helper::tag_name($cat_article->tags)}}</li>
                                                <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($cat_article->custom_date)}}</li>
                                                <li><i class="far fa-clock"></i>{{$cat_article->read_minutes}} Mins Read</li>
                                            </ul>
                                            <h3 class="item-title"><a href="{{route('detail_page',['id'=>$cat_article->id,'slug'=>Str::slug($cat_article->title,'-')])}}">{{$cat_article->title}}</a></h3>
                                            <p>{{$cat_article->meta_description}}</p>
                                            <div class="action-area">
                                                <a href="{{route('detail_page',['id'=>$cat_article->id,'slug'=>Str::slug($cat_article->title,'-')])}}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                                <ul class="response-area">
                                                    <li><a href="#"><i class="far fa-heart"></i>{{Helper::count_likes($cat_article->id)}}</a></li>
                                                    <li><a href="#"><i class="far fa-comment"></i>{{Helper::count_comments($cat_article->id)}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {!! $categoriesArticle->links() !!}
                        </div>
                        {{-- <div class="pagination-layout1">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div> --}}
                    </div>
                    {{-- right side bar section start --}}
                    <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                        {{-- search section start --}}
                        <div id="search-2" class="widget widget_search">
                            <form role="search" method="GET" class="search-form" action="{{route('search_page')}}">
                                @csrf
                                <div class="row custom-search-input">
                                    <div class="input-group col-md-12">
                                    <input type="text" class="" placeholder="Search here ..." value="" name="keyword">
                                        <span class="input-group-btn">
                                            <button class="btn" type="submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- search section end --}}
                        {{-- social media section start --}}
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">SUBSCRIBE &amp; FOLLOW</h3>
                            </div>
                            <div class="widget-follow-us">
                                <ul>
                                    <li class="single-item"><a href="https://www.facebook.com/IELTSdotlive" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    {{-- <li class="single-item"><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li class="single-item"><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li class="single-item"><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li> --}}
                                    {{-- <li class="single-item"><a href="#"><i class="fab fa-vimeo-v"></i></a></li> --}}
                                    <li class="single-item"><a href="https://www.youtube.com/@IELTSLive" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    {{-- <li class="single-item"><a href="#"><i class="fab fa-github-alt"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-kickstarter-k"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-behance"></i></a></li>
                                    <li class="single-item"><a href="#"><i class="fab fa-google-plus-g"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                        {{-- social media section end --}}
                        {{-- about me section start --}}
                        {{-- <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">ABOUT ME</h3>
                            </div>
                            <div class="widget-about">
                                <figure class="author-figure"><img src="{{asset('theme/default/img/figure/figure9.jpg')}}" alt="about"></figure>
                                <figure class="author-signature"><img src="img/figure/signature.png" alt="about"></figure>
                                <p>Fusce mauris auctor ollicituder teary iner hendrerit risusey aeenean rauctor pibus
                                    doloer.</p>
                            </div>
                        </div> --}}
                        {{-- about me section end --}}
                        {{-- newsLetter section start --}}
                        <div class="widget">
                            <div class="widget-newsletter-subscribe-dark">
                                <h3>GET LATEST UPDATES</h3>
                                <p>NEWSLETTER SUBSCRIBE</p>
                                <form class="newsletter-subscribe-form"  method="POST" id="newsLetterSubmission">
                                    <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                                        Thank you for getting in touch! 
                                    </div>
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" placeholder="your e-mail address" class="form-control"
                                            data-error="E-mail field is required" id="newsLetterEmail" required>
                                        {{-- <div class="help-block with-errors"></div> --}}
                                    </div>
                                    <div class="form-group mb-none">
                                        <button type="submit" class="item-btn">SUBSCRIBE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- newsLetter section end --}}
                        {{-- popular post section start --}}
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">POPULAR POSTS</h3>
                            </div>
                            <div class="widget-popular">
                                <div class="post-box">
                                    <div class="item-img">
                                        <a href="{{route('detail_page',['id'=>$singleCategoryPopularPost->id,'slug'=>Str::slug($singleCategoryPopularPost->title,'-')])}}"><img src="{{asset('uploads/article/thumbnail/'.$singleCategoryPopularPost->thumbnail)}}" alt="blog"></a>
                                    </div>
                                    <div class="item-content">
                                        <ul class="entry-meta meta-color-dark">
                                            <li><i class="fas fa-tag"></i>{{Helper::tag_name($singleCategoryPopularPost->tags)}}</li>
                                            <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($singleCategoryPopularPost->custom_date)}}</li>
                                        </ul>
                                        <h3 class="item-title"><a href="{{route('detail_page',['id'=>$singleCategoryPopularPost->id,'slug'=>Str::slug($singleCategoryPopularPost->title,'-')])}}">{{$singleCategoryPopularPost->page_title}}</a></h3>
                                    </div>
                                </div>
                                @foreach ($popular_post as $post)
                                    <div class="post-box">
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{Helper::tag_name($post->tags)}}</li>
                                                <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($post->custom_date)}}</li>
                                            </ul>
                                            <h3 class="item-title"><a href="{{route('detail_page',['id'=>$post->id,'slug'=>Str::slug($post->title,'-')])}}">{{$post->page_title}}</a></h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- popular post section end --}}
                        <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="{{asset('theme/default/img/figure/figure5.jpg')}}" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div>
                        {{-- category section start --}}
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">CATEGORIES</h3>
                            </div>
                            {{-- <div class="widget-categories">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{route('category_page',['id'=>$category->id, 'slug'=>$category->slug])}}">{{$category->cat_name}}
                                                <span>({{Helper::cat_wise_article($category->id)}})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> --}}
                            <div class="custom-collapse">
                                <div id="accordion">
                                    @foreach ($categories as $category)
                                        <div class="card">
                                        <div class="card-header" id="heading_{{$category->id}}">
                                            <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_{{$category->id}}" aria-expanded="true" aria-controls="collapse_{{$category->id}}">
                                                {{$category->cat_name}} <span class="">({{Helper::cat_wise_article($category->id)}})</span>
                                            </button>
                                            </h5>
                                        </div>
                                    
                                        <div id="collapse_{{$category->id}}" class="collapse" aria-labelledby="heading_{{$category->id}}" data-parent="#accordion">
                                            <div class="card-body">
                                                @php
                                                    $cat_articles_all = Helper::get_cat_wise_article_id($category->id);
                                                @endphp
                                                @foreach ($cat_articles_all as $rows)
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('detail_page',['id'=>$rows->id,'slug'=>Str::slug($rows->title,'-')])}}">
                                                                {{$rows->title}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        {{-- category section end --}}
                        {{-- tags section start --}}
                         <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">Tags</h3>
                            </div>
                            <div class="d-flex justify-content-start">
                                @foreach ($allTags as $item)
                                    <div class="widget_tag_cloud mr-2">
                                        <a href="{{route('tag_page',['id'=>$item->id, 'slug'=> Str::slug($item->name,'-')])}}">{{$item->name}}</a>
                                    </div>
                                @endforeach
                            </div>
                            
                            {{-- <div class="widget-instagram">
                                <ul>
                                    <li>
                                        <div class="item-box">
                                            <img src="img/social-figure/social-figure30.jpg" alt="Social Figure" class="img-fluid">
                                            <a href="#" class="item-icon"><i class="fab fa-instagram"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        {{-- tags section end --}}
                    </div>
                    {{-- right side bar section end --}}
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function(){
      $("#newsLetterSubmission").submit(function(e){
        e.preventDefault();
        $.ajax({
                type:'POST',
                url:"{{route('newsletter.subcribtion')}}",
                data:{"action":"newsLetter", email:$("#newsLetterEmail").val(),  "_token": "{{ csrf_token() }}",},
                dataType: 'json',
                headers: {
                    //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    "Accept": "application/json"
                },
                success: function(data){		
                    $('#successMsg').show();
                    console.log(data);
                },
                error: function(data){
                    printErrorMsg(data.error);
                }
            });
            function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

        return false;
      });
    });
</script>