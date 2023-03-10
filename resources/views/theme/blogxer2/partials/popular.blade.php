@empty(!$popular_post)
    @foreach($popular_post->take(3) as $post)
    <div class="col-md-4 col-12">
        <div class="blog-box-layout2">
            <div class="item-img">
                <a href="single-blog.html"><img  src="uploads/article/thumbnail/{{$post->thumbnail}}" alt="blog"></a>
            </div>
            <div class="item-content">
                <ul class="entry-meta meta-color-dark">
                    <li><i class="fas fa-tag"></i>Fashion</li>
                    <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                </ul>
                <h3 class="item-title"><a href="single-blog.html">{{$post->title}}</a></h3>
            </div>
        </div>
    </div>
    @endforeach
@endempty



