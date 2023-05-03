<section class="slider-wrap-layout7">
    <div class="container">
        <div class="rc-carousel nav-control-layout8" data-loop="true" data-center="false" data-items="4"
            data-margin="40" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="700" data-dots="false"
            data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
            data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
            data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="3"
            data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="3" data-r-large-nav="true"
            data-r-large-dots="false" data-r-extra-large="4" data-r-extra-large-nav="true"
            data-r-extra-large-dots="false">
            @empty(!$featured_post)
                   @foreach($featured_post->take(7) as $post)
                   <div class="slider-box-layout8">
                        <div class="item-img">
                            <img src="uploads/article/thumbnail/{{$post->thumbnail}}" alt="{{$post->title}}">
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>{{$post->category->cat_name}}</li>
                                <li><i class="fas fa-calendar-alt"></i>{{($post->created_at)->diffForHumans()}}</li>
                            </ul>
                            <h3 class="item-title"><a href="single-blog.html">{{$post->title}}</a></h3>
                        </div>
                    </div>
                   @endforeach
            @endempty
        </div>
    </div>
</section>

@push('custom-scripts')

@endpush
