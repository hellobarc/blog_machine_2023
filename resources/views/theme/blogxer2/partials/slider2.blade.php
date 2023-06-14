        <div class="rc-carousel nav-control-layout1" data-loop="true" data-items="30" data-margin="30"
            data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false"
            data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
            data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
            data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
            data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="true"
            data-r-large-dots="false" data-r-extra-large="1" data-r-extra-large-nav="true"
            data-r-extra-large-dots="false">
            @foreach ($featured_post as $item)
                <div class="slider-box-layout1">
                    <a href="{{route('detail_page',['id'=>$item->id,'slug'=>Str::slug($item->title,'-')])}}">
                        <div class="item-img">
                            <img src="{{asset('uploads/article/thumbnail/'.$item->thumbnail)}}" alt="{{$item->title}}">
                        </div>
                        <div class="item-content">
                            <ul class="entry-meta meta-color-dark">
                                <li><i class="fas fa-tag"></i>{{Helper::tag_name($item->tags)}}</li>
                                <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($item->custom_date)}}</li>
                                <li><i class="fas fa-user"></i>BY <a href="#">{{$item->author->author_name}}</a></li>
                                <li><i class="far fa-clock"></i>{{$item->read_minutes}} Mins Read</li>
                            </ul>
                            <h2 class="item-title"><a href="{{route('detail_page',['id'=>$item->id,'slug'=>Str::slug($item->title,'-')])}}">{{$item->title}}</a></h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>