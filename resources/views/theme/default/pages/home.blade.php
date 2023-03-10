
@extends('theme.'.env('SITE_THEME').'.master')
@section('meta_tags')
@if($meta)
    <title>{{$meta['title']}} - {{env('SITE_URL', 'Site Name')}}</title>
    <meta name='description' itemprop='description' content='{{$meta['description']}}' />
    <?php $tags = implode(',', $meta['tags']); ?>
    <meta name='keywords' content='{{$tags}}' />
    <meta property='article:published_time' content='{{$meta['created_at']}}' />
    <meta property='article:section' content='event' />

    <meta property="og:description" content="{{$meta['description']}}" />
    <meta property="og:title" content="{{$meta['title']}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate" content="en-us" />
    <meta property="og:site_name" content="{{env('SITE_URL', 'Site Name')}}" />
    @foreach($meta['images'] as $image)
        <meta property="og:image" content="{{$image}}" />
    @endforeach

    <meta property="og:image:url" content="{{$meta['images'][0]}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{$meta['title']}}" />
    <meta name="twitter:site" content="@BlogMachine" />
@endif
@endsection

@section('content')
    @include('theme/default/partials/slider')
    <section class="blog-wrap-layout19">
        <div class="container">
            <div class="row gutters-40 pb-3"> <!--Premium Post-->
                @include('theme/default/partials/premium')
            </div>
            <div class="row gutters-50">
                <div class="col-lg-8">
                    <div class="row">
                    @include('theme/default/partials/latest')
                    </div>
                    @include('theme/default/partials/paginate_post')
                </div>
                <div class="col-lg-4 sidebar-widget-area sidebar-break-md">
                    @include('theme/default/partials/home_sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
