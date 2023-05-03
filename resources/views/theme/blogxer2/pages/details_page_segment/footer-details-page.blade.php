{{-- tag section start --}}
<div class="blog-entry-meta">
    <ul>
        <li class="item-tag"><i class="fas fa-bookmark"></i>
            @foreach ($detail_post as $post)
                    {{Helper::tag_name($post->tags)}}
            @endforeach
        </li>
        <li class="item-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-google-plus-g"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
        </li>
        <li class="item-respons">
            <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{ $article_id}}" class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
                Like
                <span id="clicks">
                    @if($likes === NULL)
                        0
                    @else
                        {{$likes->likes}}
                    @endif
                </span>
            </span>
        </li>
    </ul>
</div>
{{-- tag section end --}}
{{-- author section start --}}
<div class="blog-author">
    @foreach ($detail_post as $post)
        <div class="media media-none--xs">
            @if($post->author->image == NULL)
                <img src="{{asset('uploads/author/avater.png')}}" alt="Author" class="media-img-auto" width="100">
            @else
                <img src="{{asset('uploads/author/'.$post->author->image)}}" alt="Author" class="media-img-auto">
            @endif
            <div class="media-body">
                <h4 class="item-title">{{$post->author->author_name}}</h4>
                <div class="item-subtitle">Author</div>
                <p>{{$post->author->author_speech}}</p>
                <ul class="item-social">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
            </div>
        </div>
    @endforeach
</div>
{{-- author section end --}}
{{-- related post start --}}
<div class="related-item">
    <div class="section-heading-4 heading-dark">
        <h3 class="item-heading">YOU MAY ALSO LIKE</h3>
    </div>
    <div class="row">
        @foreach ($related_post as $relate_post)
            <div class="col-sm-4 col-12">
                <div class="blog-box-layout1 text-left">
                    <div class="item-img">
                        <a href="{{route('detail_page',['id'=>$relate_post->id,'slug'=>Str::slug($relate_post->title,'-')])}}"><img src="{{asset('uploads/article/thumbnail/'.$relate_post->thumbnail)}}" alt="blog"></a>
                    </div>
                    <div class="item-content">
                        <ul class="entry-meta meta-color-dark">
                            <li><i class="fas fa-tag"></i>{{$relate_post->category->cat_name}}</li>
                            <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($relate_post->custom_date)}}</li>
                        </ul>
                        <h5 class="item-title"><a href="{{route('detail_page',['id'=>$relate_post->id,'slug'=>Str::slug($relate_post->title,'-')])}}">{{$relate_post->title}}</a></h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
{{-- related post end --}}
{{-- user comment section start --}}
<div class="blog-comment">
    <div class="section-heading-4 heading-dark">
        <h3 class="item-heading">{{$comments->count()}} COMMENTS</h3>
    </div>
    @foreach ($comments as $comment)
        <div class="media media-none--xs">
            <img src="{{asset('uploads/author/avater.png')}}" alt="Blog Comments" class="img-fluid media-img-auto" width="50">
            <div class="media-body">
                <h4 class="item-title">{{$comment->user->name}}</h4>
                <div class="item-subtitle">{{date("i:s",((strtotime($comment->created_at->format('H:i:s')))-time()))}} Mins Ago</div>
                <p>{{$comment->comment}}</p>
                @if(Auth::guard('customLogin')->user())
                    <button class="item-btn" onclick="replyButton({{$comment->id}})" style="border:none;">Reply</button>
                @else
                    <div id="reply_box">
                        <button class="item-btn" style="border:none;" id="replyCommentLogin">Click</button>
                    </div>
                @endif
            </div>
        </div>
        <div id="replyForm_{{$comment->id}}" style="display: none;">
            <form id="replyFormSubmitt">
                <input type="hidden" name="comment_id" id="comment_id" value="{{$comment->id}}">
                <input type="hidden" name="article_id" id="article_id" value="{{$article_id}}">
                <div class="alert alert-success" role="alert" id="successMsg" style="display: none; margin-top:3px" >
                    Thank you for getting in touch! 
                </div>
                <div class="row mt-3">
                    <div class="col-md-1 form-group"></div>
                    <div class="col-md-10 form-group">
                        <textarea placeholder="Write your comments ..." class="replyComment"
                            name="replyMessage" id="replyMessage" rows="1" cols="20" data-error="Message field is required"
                            required></textarea>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="col-md-1 form-group mt-3">
                        <button type="submit" class="btn btn-light fw-bold" style="border:none; float:right;">Reply</button>
                        {{-- <input type="button" onclick="replyComment({{$comment->id}})" value="Submit form"> --}}
                    </div>
                </div>
            </form>
        </div>
    @endforeach
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $comments->links() !!}
    </div>

</div>
{{-- user comment section end --}}
{{-- user comment submission section start --}}
<div class="blog-form">
    <div class="section-heading-4 heading-dark">
        <h3 class="item-heading">WRITE A COMMENT</h3>
    </div>
    @if(Auth::guard('customLogin')->user())
        <form class="contact-form-box" id="commentSubmitForm">
            <input type="hidden" name="article_id" id="article_id" value="{{$article_id}}">
            <div class="row gutters-15">
                <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                    Thank you for getting in touch! 
                </div>
                <div class="col-12 form-group">
                    <textarea placeholder="Write your comments ..." class="textarea form-control"
                        name="message" id="message" rows="8" cols="20" data-error="Message field is required"
                        required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                
                <div class="col-12 form-group">
                    <button type="submit" class="item-btn">POST COMMENT</button>
                </div>
            </div>
            <div class="form-response"></div>
        </form>
    @else
        <div id="comment_login_box">
            <button class="btn btn-dark btn-lg fs-1 fw-bold p-3" id="commentLogin">Login First</button>
        </div>
        {{-- login modal --}}
        
    @endif
</div>
{{-- user comment submission section end --}}