<nav id="dropdown" class="template-main-menu">
    <ul>
        <li class="hide-on-mobile-menu">
            <a href="{{route('homepage')}}">HOME</a>
        </li>
        <li class="hide-on-desktop-menu">
            <a href="#">HOME</a>
        </li>
        <li>
            <a href="about.html">ABOUT</a>
        </li>
        <li>
            <a href="#">CATEGORIES</a>
            <ul class="dropdown-menu-col-1">
                @foreach ($contents as $content)
                    <li>
                        <a href="{{route('categorypage',$content->id)}}">{{$content->cat_name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="hide-on-desktop-menu">
            <a href="#">Pages</a>
            <ul>
                <li>
                    <a href="about.html">About 1</a>
                </li>
                <li>
                    <a href="blog-category1.html">Blog Category 1</a>
                </li>
                <li>
                    <a href="single-blog.html">Blog Details 1</a>
                </li>
                <li>
                    <a href="archives1.html">Archives 1</a>
                </li>
                <li>
                    <a href="404.html">404 Error</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="contact.html">CONTACT</a>
        </li>

        <li>
            <a href="contact.html" ><span class="brn btn-primary p-3">LOGIN</span></a>
        </li>
    </ul>
</nav>

@push('custom-scripts')
    <script>
      //  alert("love");
    </script>
@endpush
