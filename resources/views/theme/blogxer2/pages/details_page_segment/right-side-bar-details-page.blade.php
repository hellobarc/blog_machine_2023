<div class="sidebar-widget-area sidebar-break-md">
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
    {{-- popular post section start --}}
    <div class="widget">
        <div class="section-heading heading-dark">
            <h3 class="item-heading">POPULAR POSTS</h3>
        </div>
        <div class="widget-latest">
            <ul class="block-list">
                @foreach ($popularPost as $popular_post)
                <li class="single-item">
                    <div class="item-img" style="width: 30%; margin-right: 5px; border-radius:3px">
                        <a href="{{route('detail_page',['id'=>$popular_post->id,'slug'=>Str::slug($popular_post->title,'-')])}}">
                            <img src="{{asset('uploads/article/thumbnail/'.$popular_post->thumbnail)}}" alt="{{$popular_post->title}}">
                        </a>
                    </div>
                    <div class="item-content" style="margin-left: 11px;">
                        <ul class="entry-meta meta-color-dark">
                            <li><i class="fas fa-tag"></i>{{$popular_post->category->cat_name}}</li>
                            <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($popular_post->custom_date)}}</li>
                        </ul>
                        <h4 class="item-title" style="margin-left: 2px"><a href="{{route('detail_page',['id'=>$popular_post->id,'slug'=>Str::slug($popular_post->title,'-')])}}">{{$popular_post->title}}</a></h4>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- popular post section end --}}
     {{-- social media section start --}}
    <div class="widget">
        <div class="section-heading heading-dark">
            <h3 class="item-heading">FOLLOW ME ON</h3>
        </div>
        <div class="widget-follow-us-2">
            <ul>
                <li class="single-item"><a href="https://www.facebook.com/IELTSdotlive" target="_blank"><i class="fab fa-facebook-f"></i>LIKE ME ON</a></li>
                {{-- <li class="single-item"><a href="#" target="_blank"><i class="fab fa-twitter"></i>FOLLOWE ME</a></li>
                <li class="single-item"><a href="#" target="_blank"><i class="fab fa-instagram"></i>FOLLOW ME</a></li>
                <li class="single-item"><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i>FOLLOW ME</a></li>
                <li class="single-item"><a href="#" target="_blank"><i class="fab fa-pinterest-p"></i>FOLLOW ME</a></li> --}}
                <li class="single-item"><a href="https://www.youtube.com/@IELTSLive" target="_blank"><i class="fab fa-youtube"></i>SUBSCRIBE</a></li>
            </ul>
        </div>
    </div>
    {{-- social media section end --}}
    {{-- newsLetter section start --}}
    <div class="widget">
        <div class="widget-newsletter-subscribe-dark">
            <h3>GET LATEST UPDATES</h3>
            <p>NEWSLETTER SUBSCRIBE</p>
            <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                Thank you for getting in touch! 
            </div>
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <form class="newsletter-subscribe-form" method="POST" id="newsLetterSubmission">
                
                <div class="form-group">
                    <input type="email" placeholder="your e-mail address" class="form-control" name="email"
                    id="newsLetterEmail" data-error="E-mail field is required" required>
                </div>
                <div class="form-group mb-none">
                    <button type="submit" class="item-btn">SUBSCRIBE</button>
                </div>
            </form>
        </div>
    </div>
    {{-- newsLetter section end --}}
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
                            <span>{{Helper::cat_wise_article($category->id)}}</span>
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
    <div class="widget">
        <div class="widget-ad">
            <a href="#"><img src="{{asset('theme/default/img/figure/figure5.jpg')}}" alt="Ad" class="img-fluid"></a>
        </div>
    </div>
    {{-- tag section start --}}
    <div class="widget">
        <div class="section-heading heading-dark">
            <h3 class="item-heading">Tags</h3>
        </div>
        <div class="row">
            @foreach ($allTags as $item)
            <div class="col">
                <div class="widget_tag_cloud mr-2">
                    <a href="{{route('tag_page',['id'=>$item->id, 'slug'=> Str::slug($item->name,'-')])}}">{{$item->name}}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- tag section end --}}
</div>
{{-- details page right side bar end --}}