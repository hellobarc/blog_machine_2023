@foreach ($detail_post as $post)
<div class="breadcrumbs-area">
    <h1>{{$post->page_title}}</h1>
    <ul>
        <li>
            <a href="{{route('home_page')}}">Home</a>
        </li>
        <li>
            <a href="{{route('category_page',['id'=>$post->category->id, 'slug'=>$post->category->slug])}}">{{$post->category->cat_name}}</a>
        </li>
        <li>{{$post->page_title}}</li>
    </ul>
</div>
<ul class="item-social">
    <li><a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i>SHARE</a></li>
    <li><a href="https://twitter.com/share?url={{url()->current()}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i>SHARE</a></li>
    <li><a href="https://web.whatsapp.com/send?url={{url()->current()}}" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i>SHARE</a></li>
   <li><a href="https://www.linkedin.com/shareArticle?url={{url()->current()}}" target="_blank" class="pinterst"><i class="fab fa-linkedin-in"></i>Linked In</a></li>
    <!--<li><a href="#" class="load-more"><i class="fas fa-plus"></i>MORE</a></li>-->
</ul>
@endforeach