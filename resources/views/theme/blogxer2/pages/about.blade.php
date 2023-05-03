@extends('theme.'.env('SITE_THEME').'.master')
@section('content')
  <!-- Inne Page Banner Area Start Here -->
  <section class="inner-page-banner bg-common">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>About</h1>
                    <ul>
                        <li>
                            <a href="{{route('home_page')}}">Home</a>
                        </li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inne Page Banner Area End Here -->
 <!-- About Area Start Here -->
 <section class="about-wrap-layout1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-box-layout2">
                            <div class="item-subtitle">Hello!</div>
                            {{-- <h2 class="item-title"><span>I’m</span> Rosario Kareon </h2> --}}
                            <p>IELTS Live is a web-based application built by British American Resource Centre (BARC) as part of our integrated online learning environment. 
                                It has been made accessible not only to our students but also to IELTS candidates all over the world. 
                                IELTS Live is the system where candidates can take IELTS mock tests, see their band scores, learn from their mistakes and get useful tips from some of our highly experienced instructors at BARC. 
                                Extra measures have been taken towards ensuring the application’s user-friendliness and quality of each feedback, in order to provide beneficial learning experiences for the IELTS candidates.
                            </p>
                           
                            <ul class="item-social">
                                <li><a href="https://www.facebook.com/IELTSdotlive" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li> --}}
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.youtube.com/@IELTSLive" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                {{-- <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="about-box-layout3">
                            <img src="img/about/about2.jpg" alt="about">
                            <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                <i class="flaticon-play-arrow"></i>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Area End Here -->
<!-- Progress Bar Start Here -->
<section class="progress-wrap-layout1">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="progress-box-layout1">
                    <div class="item-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="counter counter-text">{{$all_post->count()}}</div>
                    <h3 class="item-title">Total Posts</h3>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="progress-box-layout1">
                    <div class="item-icon">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="counter counter-text">{{Helper::total_likes()}}</div>
                    <h3 class="item-title">Favourites</h3>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="progress-box-layout1">
                    <div class="item-icon">
                        <i class="far fa-eye"></i>
                    </div>
                    <div class="counter counter-text">{{Helper::total_views()}}</div>
                    <h3 class="item-title">Total Views</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Letter Start Here -->
<section class="newsletter-wrap-layout1">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7">
                <div class="newsletter-box-layout1">
                    <h3 class="item-title">SUBSCRIBE TO NEWSLETTER</h3>
                    <div class="item-subtitle">Latest News &amp; Updates</div>
                    <form class="newsletter-subscribe-form" id="aboutNewsLetterSubmission">
                        <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                            Thank you for getting in touch! 
                        </div>
                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <div class="row gutters-10 d-flex align-items-center">
                            <div class="col-lg-9 form-group">
                                <input type="email" placeholder="Enter your e-mail" class="form-control" name="email" id="newsLetterEmail">
                            </div>
                            <div class="col-lg-3 form-group">
                                <button type="submit" class="item-btn">SUBSCRIBE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Letter End Here -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- newsLetter submission --}}
<script>
    $(document).ready(function(){
      $("#aboutNewsLetterSubmission").submit(function(e){
            e.preventDefault();
            $.ajax({
                    type:'POST',
                    url:"{{route('newsletter.subcribtion')}}",
                    data:{"action":"newsLetter", email:$("#newsLetterEmail").val(),  "_token": "{{ csrf_token() }}",},
                    dataType: 'json',
                    headers: {
                        //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        "Accept": "application/json"
                    },
                    success: function(data){		
                        $('#successMsg').show();
                        console.log(data);
                    },
                    error: function(data){
                        printErrorMsg(data.error);
                    }
                });
                function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
            return false;
      });
    });
</script>