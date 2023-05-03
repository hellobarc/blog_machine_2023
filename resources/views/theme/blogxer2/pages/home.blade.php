
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
  {{-- <section class="slider-wrap-layout2">
	@include('theme/'.env('SITE_THEME').'/partials/slider')
  </section> --}}
  <section class="slider-wrap-layout1">
    <div class="container">
        @include('theme/'.env('SITE_THEME').'/partials/slider2')
    </div>
</section>
     <!-- Blog Area Start Here -->

        <section class="blog-wrap-layout1">
            <div class="container">
                <div class="row gutters-40">
                    @include('theme/'.env('SITE_THEME').'/partials/latest_three_post')
                </div>
            </div>
        </section>

        <!-- Blog Area End Here -->
        <!-- Blog Area Start Here -->
        <section class="blog-wrap-layout3">
            <div class="container">
                <div class="row gutters-40">
                    <div class="col-lg-8">
                        {{-- top rating post start --}}
                        @if(!empty($topLikesPost))
                            <div class="blog-box-layout1 text-left">
                                <div class="item-img">
                                    <a href="{{route('detail_page',['id'=>$topLikesPost->id,'slug'=>Str::slug($topLikesPost->title,'-')])}}"><img src="{{asset('uploads/article/thumbnail/'.$topLikesPost->thumbnail)}}" alt="blog"></a>
                                </div>
                                <div class="item-content">
                                    <ul class="entry-meta meta-color-dark">
                                        <li><i class="fas fa-tag"></i>{{Helper::tag_name($topLikesPost->tags)}}</li>
                                        <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($topLikesPost->custom_date)}}</li>
                                        <li><i class="fas fa-user"></i>BY <a href="#">{{$topLikesPost->author->author_name}}</a></li>
                                        <li><i class="far fa-clock"></i>{{$topLikesPost->read_minutes}} Mins Read</li>
                                    </ul>
                                    <h2 class="item-title"> <a href="{{route('detail_page',['id'=>$topLikesPost->id,'slug'=>Str::slug($topLikesPost->title,'-')])}}">{{$topLikesPost->page_title}}</a></h2>
                                    <p>{{$topLikesPost->meta_description}}</p>
                                    <a href="{{route('detail_page',['id'=>$topLikesPost->id,'slug'=>Str::slug($topLikesPost->title,'-')])}}" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endif
                        {{-- top rating post end --}}
                        {{-- <div class="row gutters-20">
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
                        </div> --}}
                        {{-- all article with paginate section start --}}
                        <div class="row gutters-40">
                            @foreach ($paginate_post as $row)
                                <div class="col-md-6">
                                    <div class="blog-box-layout1 text-left">
                                        <div class="item-img">
                                            <a href="{{route('detail_page',['id'=>$row->id,'slug'=>Str::slug($row->title,'-')])}}"><img src="{{asset('uploads/article/thumbnail/'.$row->thumbnail)}}" alt="blog"></a>
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{Helper::tag_name($row->tags)}}</li>
                                                <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($row->custom_date)}}</li>
                                                <li><i class="far fa-clock"></i>{{$row->read_minutes}} Mins Read</li>
                                            </ul>
                                            <h3 class="item-title"> <a href="{{route('detail_page',['id'=>$row->id,'slug'=>Str::slug($row->title,'-')])}}">{{$row->title}}</a></h3>
                                            <p>{{substr($row->meta_description, 0, 200)}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                         {{-- Pagination --}}
                        <div class="d-flex justify-content-center">
                            {!! $paginate_post->links() !!}
                        </div>
                        {{-- <div class="pagination-layout1">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div> --}}
                        {{-- all article with paginate section end --}}
                    </div>
                    {{-- right side section start --}}
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
                                <h3 class="item-heading">FOLLOW ME ON</h3>
                            </div>
                            <div class="widget-follow-us-2">
                                <ul>
                                    <li class="single-item"><a href="https://www.facebook.com/IELTSdotlive" target="_blank"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                                    {{-- <li class="single-item"><a href="#" target="_blank"><i class="fab fa-twitter"></i>52K FOLLOWERS</a></li>
                                    <li class="single-item"><a href="#" target="_blank"><i class="fab fa-instagram"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i>FOLLOW ME</a></li>
                                    <li class="single-item"><a href="#" target="_blank"><i class="fab fa-pinterest-p"></i>FOLLOW ME</a></li> --}}
                                    <li class="single-item"><a href="https://www.youtube.com/@IELTSLive" target="_blank"><i class="fab fa-youtube"></i>SUBSCRIBE NOW</a></li>
                                </ul>
                            </div>
                        </div>
                        {{-- social media section end --}}
                        {{-- trending and popular post section start --}}
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
                                            @foreach ($trending_post as $trendingPost)
                                                <li class="post-item">
                                                    <div class="item-img" style="width: 25%; margin-right: 5px; border-radius:3px">
                                                        <a href="{{route('detail_page',['id'=>$trendingPost->id,'slug'=>Str::slug($trendingPost->title,'-')])}}"><img src="{{asset('uploads/article/thumbnail/'.$trendingPost->thumbnail)}}" alt="Post"></a>
                                                    </div>
                                                    <div class="item-content">
                                                        <ul class="entry-meta meta-color-dark">
                                                            <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($trendingPost->custom_date)}}</li>
                                                        </ul>
                                                        <h4 class="item-title"><a href="{{route('detail_page',['id'=>$trendingPost->id,'slug'=>Str::slug($trendingPost->title,'-')])}}">{{$trendingPost->title}}</a></h4>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="related2">
                                        <ul class="post-list">
                                            @foreach ($popular_post as $popularPost)
                                                <li class="post-item">
                                                    <div class="item-img" style="width: 25%; margin-right: 5px; border-radius:3px">
                                                        <a href="{{route('detail_page',['id'=>$popularPost->id,'slug'=>Str::slug($popularPost->title,'-')])}}"><img src="{{asset('uploads/article/thumbnail/'.$popularPost->thumbnail)}}" alt="Post"></a>
                                                    </div>
                                                    <div class="item-content mt-2">
                                                        <ul class="entry-meta meta-color-dark">
                                                            <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($popularPost->custom_date)}}</li>
                                                        </ul>
                                                        <h4 class="item-title"><a href="{{route('detail_page',['id'=>$popularPost->id,'slug'=>Str::slug($popularPost->title,'-')])}}">{{$popularPost->title}}</a></h4>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- trending and popular post section end --}}
                        {{-- <div class="widget">
                            <div class="widget-ad">
                                <a href="#"><img src="{{asset('theme/default/img/figure/figure2.jpg')}}" alt="Ad" class="img-fluid"></a>
                            </div>
                        </div> --}}
                        {{-- news letter section start --}}
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">NEWSLETTER SUBSCRIBER</h3>
                            </div>
                            <div class="widget-newsletter-subscribe-2">
                                <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                                    Thank you for getting in touch! 
                                </div>
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <form class="subscribe-form" method="POST" id="newsLetterSubmission">
                                    <div class="input-group stylish-input-group">
                                        <input type="email" class="form-control" placeholder="Type your E-mail . . ." id="newsLetterEmail">
                                        <span class="input-group-addon">
                                            <button type="submit">SUBMIT
                                                <span class="fas fa-angle-right" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- news letter section end --}}
                        {{-- category section start --}}
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">CATEGORIES</h3>
                            </div>
                            <div class="widget-categories-2">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{route('category_page',['id'=>$category->id, 'slug'=>$category->slug])}}">
                                                <h4 class="item-title">{{$category->cat_name}}</h4>
                                                <span class="item-subtitle">{{Helper::cat_wise_article($category->id)}} Posts</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- category section end --}}
                        {{-- featured post section start --}}
                        <div class="widget">
                            <div class="section-heading heading-dark">
                                <h3 class="item-heading">FEATURED POSTS</h3>
                            </div>
                            <div class="widget-featured-post">
                                @foreach ($latestSingleFeaturePost as $item)
                                    <div class="featured-post-box-1">
                                        <div class="item-img">
                                            <img src="{{asset('uploads/article/thumbnail/'.$item->thumbnail)}}" alt="Blog Post">
                                        </div>
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{Helper::tag_name($item->tags)}}</li>
                                                <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($item->custom_date)}}</li>
                                                <li><i class="far fa-clock"></i>{{$item->read_minutes}} Mins Read</li>
                                            </ul>
                                            <h4 class="item-title">
                                                <a href="{{route('detail_page',['id'=>$item->id,'slug'=>Str::slug($item->title,'-')])}}">{{$item->title}}</a>
                                            </h4>
                                            <p>{{$item->meta_description}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                @foreach ($randomThreeFeaturePost as $item)
                                    <div class="featured-post-box-2">
                                        <div class="item-content">
                                            <ul class="entry-meta meta-color-dark">
                                                <li><i class="fas fa-tag"></i>{{Helper::tag_name($item->tags)}}</li>
                                                <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($item->custom_date)}}</li>
                                                <li><i class="far fa-clock"></i>{{$item->read_minutes}}</li>
                                            </ul>
                                            <h4 class="item-title">
                                                <a href="{{route('detail_page',['id'=>$item->id,'slug'=>Str::slug($item->title,'-')])}}">{{$item->title}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- featured post section end --}}
                    </div>
                    {{-- right side section end --}}
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