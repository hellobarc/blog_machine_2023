@empty(!$latest_post)
    @foreach($latest_post->take(1) as $post)
	 <div class="blog-box-layout1 text-left">
		<div class="item-img">
			<a href="single-blog.html"><img src="{{asset('uploads/article/thumbnail')}}/{{$post->thumbnail}}" alt="{{$post->title}}" ></a>
		</div>
		<div class="item-content">
			<ul class="entry-meta meta-color-dark">
				<li><i class="fas fa-tag"></i>Fashion</li>
				<li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
				<li><i class="fas fa-user"></i>BY <a href="#">Mark Willy</a></li>
				<li><i class="far fa-clock"></i>5 Mins Read</li>
			</ul>
			<h2 class="item-title"> <a href="single-blog.html">{{$post->title}}</a></h2>
			<p>Aimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
				industry's standard dummy Lorem Ipsum has been the Lorem Ipsum has been the industry's
				standard dummy text ever since theindustry's
				standard dummy text ever since the text ever since the</p>
			<a href="single-blog.html" class="item-btn">READ MORE<i class="fas fa-arrow-right"></i></a>
		</div>
	</div>
    @endforeach
@endempty



