@empty(!$latest_post)
    @foreach($latest_post->take(10) as $post)
    <div class="blog-box-layout4">
        <div class="item-img">
            <a href="single-blog.html"><img src="theme/default/img/blog/blog149.jpg" alt="blog"></a>
        </div>
        <div class="item-content">
            <ul class="entry-meta meta-color-dark">
                <li><i class="fas fa-tag"></i>Business</li>
                <li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
                <li><i class="far fa-clock"></i>5 Mins Read</li>
            </ul>
            <h3 class="item-title"><a href="single-blog.html">Pebble time steel is on track 2019 to
                    ship in January</a></h3>
            <p>Phasellus lorem ligula, semper vehicula dolor vitae eleifen deary deary mattis sem.</p>
            <div class="action-area">
                <a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
                <ul class="response-area">
                    <li><a href="#"><i class="far fa-heart"></i>12</a></li>
                    <li><a href="#"><i class="far fa-comment"></i>02</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
@endempty

<div class="pagination-layout1">
    <ul>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
    </ul>
</div>
