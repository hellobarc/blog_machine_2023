@empty(!$latest_post)
    @foreach($latest_post->skip(1)->take(3) as $post)
	   <div class="col-lg-4">
			<div class="blog-box-layout1 text-left">
				<div class="item-img">
					<a href="{{route('detail_page',['id'=>$post->id,'slug'=>Str::slug($post->title,'-')])}}">
						<img src="{{asset('uploads/article/thumbnail')}}/{{$post->thumbnail}}" alt="{{$post->title}}">
					</a>
				</div>
				<div class="item-content">
					<ul class="entry-meta meta-color-dark">
						<li><i class="fas fa-tag"></i>{{Helper::tag_name($post->tags)}}</li>
						<li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($post->custom_date)}}</li>
						<li><i class="far fa-clock"></i>{{$post->read_minutes}} Mins Read</li>
					</ul>
                    <h2 class="item-title"><a href="{{route('detail_page',['id'=>$post->id,'slug'=>Str::slug($post->title,'-')])}}">{{$post->title}}</a></h2>
					<p>{{$post->meta_description}}</p>
				</div>
			</div>
		</div>
	@endforeach
@endempty



