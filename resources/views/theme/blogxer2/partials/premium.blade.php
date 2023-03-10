@empty(!$premium_post)
    @foreach($premium_post->skip(1)->take(3) as $post)
	   <div class="col-lg-4">
			<div class="blog-box-layout1 text-left">
				<div class="item-img">
					<a href="single-blog.html"><img src="{{asset('uploads/article/thumbnail')}}/{{$post->thumbnail}}" alt="blog"></a>
				</div>
				<div class="item-content">
					<ul class="entry-meta meta-color-dark">
						<li><i class="fas fa-tag"></i>Architecture</li>
						<li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
						<li><i class="far fa-clock"></i>5 Mins Read</li>
					</ul>
                    <h2 class="item-title"><a href="{{route('detail_page',['id'=>$post->id,'slug'=>Str::slug($post->title,'-')])}}">{{$post->title}}</a></h2>
					<p>Aliquam faucibus nisl nisl. Maecenas vestibumery
						astero convallis dapibus dignissim. </p>
				</div>
			</div>
		</div>
@endforeach
@endempty



