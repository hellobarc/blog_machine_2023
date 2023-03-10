@empty(!$latest_post)
    @foreach($latest_post->skip(1)->take(3) as $post)
	 <div class="col-lg-4">
		<div class="blog-box-layout1 text-left">
			<div class="item-img">
				<a href="single-blog.html"><img src="{{asset('uploads/article/thumbnail')}}/{{$post->thumbnail}}" alt="{{$post->title}}"></a>
			</div>
			<div class="item-content">
				<ul class="entry-meta meta-color-dark">
					<li><i class="fas fa-tag"></i>Architecture</li>
					<li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
					<li><i class="far fa-clock"></i>5 Mins Read</li>
				</ul>
				<h3 class="item-title"><a href="single-blog.html">{{$post->title}}</a></h3>
				<p>Aliquam faucibus nisl nisl. Maecenas vestibumery
					astero convallis dapibus dignissim. </p>
			</div>
		</div>
	</div>
    @endforeach
@endempty



