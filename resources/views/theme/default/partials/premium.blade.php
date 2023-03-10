@empty(!$premium_post)
    @foreach($premium_post->take(2) as $post)
    <div class="col-lg-6 col-12">
        <div class="blog-box-layout16">
            <div class="item-img">
                <img src="{{asset('uploads/article/thumbnail')}}/{{$post->thumbnail}}" alt="slider">
                <div class="item-content">
                    <ul class="entry-meta meta-color-light">
                        <li><i class="fas fa-tag"></i>Share Market</li>
                        <li><i class="fas fa-calendar-alt"></i>October 19, 2019</li>
                        <li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
                    </ul>
                    <h2 class="item-title"><a href="{{route('detail_page',['id'=>$post->id,'slug'=>Str::slug($post->title,'-')])}}">{{$post->title}}</a></h2>
                    <p>Stevenson and Wolfers also find, a clear role for absolute income and a
                        more limited relative income comparison.</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endempty


