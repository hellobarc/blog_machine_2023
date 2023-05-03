<div id="header-search" class="header-search">
    <button type="button" class="close">×</button>
    <form action="{{route('search_page')}}" class="header-search-form" method="GET" enctype="multipart/form-data">
        @csrf
        <input type="search" value="" placeholder="Type here........" name="keyword"/>
        <button type="submit" class="search-btn">
            <i class="flaticon-magnifying-glass"></i>
        </button>
    </form>
</div>
