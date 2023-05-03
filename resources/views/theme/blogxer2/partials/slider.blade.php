<div class="rc-carousel nav-control-layout2" data-loop="true" data-center="true" data-items="5" data-margin="20"
		data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="700" data-dots="false" data-nav="true"
		data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false"
		data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1"
		data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="true"
		data-r-medium-dots="false" data-r-large="2" data-r-large-nav="true" data-r-large-dots="false"
		data-r-extra-large="2" data-r-extra-large-nav="true" data-r-extra-large-dots="false">
		@foreach ($featured_post as $item)
			<div class="slider-box-layout2">
				<a href="{{route('detail_page',['id'=>$item->id,'slug'=>Str::slug($item->title,'-')])}}">
					<div class="item-img">
						{{-- <img src="{{asset('theme/default/img/slider/slide2-1.jpg')}}" alt="slider"> --}}
						<img src="{{asset('uploads/article/thumbnail/'.$item->thumbnail)}}" alt="slider">
						<div class="item-content">
							<ul class="entry-meta meta-color-light">
								<li><i class="fas fa-tag"></i>{{Helper::tag_name($item->tags)}}</li>
								<li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($item->custom_date)}}</li>
								<li><i class="fas fa-user"></i>BY <a href="#">{{$item->author->author_name}}</a></li>
								<li><i class="far fa-clock"></i>{{$item->read_minutes}} Mins Read</li>
							</ul>
							<h2 class="item-title"><a href="{{route('detail_page',['id'=>$item->id,'slug'=>Str::slug($item->title,'-')])}}">{{$item->title}}</a></h2>
							<p>{{$item->meta_description}}</p>
						</div>
					</div>
				</a>
			</div>	
		@endforeach
	</div>