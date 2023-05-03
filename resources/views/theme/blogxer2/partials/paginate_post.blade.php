@empty(!$latest_post)
    @foreach($latest_post->take(10) as $post)
     <div class="col-md-6">
		<div class="blog-box-layout1 text-left">
			<div class="item-img">
				<a href="single-blog.html"><img src="theme/default/img/blog/blog149.jpg" alt="blog"></a>
			</div>
			<div class="item-content">
				<ul class="entry-meta meta-color-dark">
					<li><i class="fas fa-tag"></i>Travel</li>
					<li><i class="fas fa-calendar-alt"></i>Jan 19, 2019</li>
					<li><i class="far fa-clock"></i>5 Mins Read</li>
				</ul>
				<h3 class="item-title"> <a href="single-blog.html">{{$post->title}}</a></h3>
				<p>Aliquam erat volutpat. Curabitur vene natiareset massa secus tristique
					aewnon auctor nislerty
					sodales iquam erat volutpat.</p>
			</div>
		</div>
	</div>
    @endforeach
@endempty

<!--
<div class="pagination-layout1">
    <ul>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
    </ul>
</div>
-->