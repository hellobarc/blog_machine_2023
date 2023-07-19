@extends('theme.'.env('SITE_THEME').'.master')
<link rel="stylesheet" href="{{asset('frontend/quiz/css/style.css')}}">
@section('meta_tags')
@if($meta)
    <title>{{$meta['title']}}</title>
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
    {{-- <meta property="og:image" content="{{$image}}" /> --}}
        <meta property="og:image" content="{{asset('uploads/article/thumbnail/'.$image)}}" />
    @endforeach
{{-- <meta property="og:image:url" content="{{$meta['images'][0]}}" /> --}}
    <meta property="og:image:url" content="{{asset('uploads/article/thumbnail/'.$meta['images'][0])}}" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{$meta['title']}}" />
    <meta name="twitter:site" content="@BlogMachine" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endif
@endsection

@section('content')
<div class="progress-bar">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</div>
<button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" id="back_to_top" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
{{-- <a id="back_to_top">Top</a> --}}
<!-- Inne Page Banner Area Start Here -->
<section class="inner-page-banner bg-common">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @include('theme.blogxer2.pages.details_page_segment.banner-details-page')
            </div>
        </div>
    </div>
</section>
<!-- Inne Page Banner Area End Here -->
         <!-- Single Blog Banner Start Here -->
         <section class="single-blog-wrap-layout1" style="margin-top: 5rem;">
             
            <div class="container">
                <div class="row gutters-50">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div>
                            @foreach ($detail_post as $post)
                                <div class="item-img">
                                    <img src="{{asset('uploads/article/thumbnail/'.$post->thumbnail)}}" alt="{{$post->title}}" style="border-radius: 4px;">
                                </div>
                                <ul class="entry-meta meta-color-dark my-5">
                                    <li><i class="fas fa-user"></i>BY <a href="#">{{$post->author->author_name}}</a></li>
                                    <li><i class="fas fa-tag"></i>{{Helper::tag_name($post->tags)}}</li>
                                    <li><i class="fas fa-calendar-alt"></i>{{Helper::integerDateToString($post->custom_date)}}</li>
                                    <li><i class="far fa-clock"></i>{{$post->read_minutes}} Mins Read</li>
                                    <li><a href="#"><i class="far fa-eye"></i>{{Helper::count_views($post->id)}}</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>{{Helper::count_comments($post->id)}}</a></li>
                                    {{-- <li><a href="#"><i class="far fa-heart"></i>{{Helper::count_likes($post->id)}}</a></li> --}}
                                    {{-- <li><a href="#"><i class="fas fa-share"></i>302</a></li> --}}
                                </ul>
                            @endforeach
                            <hr>
                        </div>
                        <div class="single-blog-box-layout1">
                            @if(!empty($data))
                                @foreach ($data as $post)
                                    <div class="blog-details mb-0">    
                                            @if($post['contentType'] == 'text')
                                                {!!$post['contentData']->content!!}
                                                {{-- Quiz section start --}}
                                                @if($post['quizType'] != NULL)
                                                    @if ($post['contentData']->article_content_id == $post['quizContentId'])
                                                        {{-- question drop down --}}
                                                        @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="drop_down_QuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="dropDown_ans[]" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkDropDown">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question true false --}}
                                                        @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="trueFalseQuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="true_false_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="true_false_ans[]"  class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkTrueFalse">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question multiple choice --}}
                                                        @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="multipleChoiceFormSubmission" method="POST">
                                                                    <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section  --}}
                                                            <div class="checkMultipleChoice">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                            
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                                <div class="d-flex">
                                                                                    @if(in_array( $loop->index ,$correct_ans))
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            <span class="right_radio">
                                                                                                {{$option}}
                                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            @if($correct_ans != $submitted_ans)
                                                                                                @if($key == $submitted_ans)
                                                                                                    <span class="wrong_radio">
                                                                                                        {{$option}}
                                                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                    </span>
                                                                                                @else
                                                                                                    <span class="">
                                                                                                        {{$option}}
                                    
                                                                                                    </span>
                                                                                                @endif
                                                                                            @endif
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question radio --}}
                                                        @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="radioQuizSubmisstion" method="POST">
                                                                    <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkRadio">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question fill in the blank --}}
                                                        @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                            <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                            <div id="">
                                                                <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                    <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                        <div class="fill_blanks main-text">
                                                                            @if($question->is_show == 'yes')
                                                                                @php
                                                                                    $options = json_decode($question->blank_answer);
                                                                                    shuffle($options);
                                                                                @endphp
                                                                                <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                    @foreach($options as $option)
                                                                                        <p class="mx-2">{{$option}}</p>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $replace_content = "<input type='text' name='{$question->id}'>";
                                                                            @endphp
                                                                            <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkFillBlank">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->blank_answer);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                            $raw_content = explode('##blank##',$question->text);
                                                                                $processed_content = '';
                                                                                foreach ($raw_content as $key => $value) {
                                                                                    if($key==0 ){
                                                                                            $processed_content .=$value;
                                                                                    }else{
                                                                                            $show_ans = '';
                                                                                            if(strpos($options[$key-1], '/')){
                                                                                                $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                    $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                        
                                                                                        $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                        
                                                                                    }
                                                                                }
                                                                        @endphp
                                                                        {{$loop->index+1}}. {!!$processed_content!!}
                                                                        <br>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif   
                                                @else
                                                @endif
                                                {{-- Quiz section end --}}
                                            @elseif($post['contentType'] == 'quote')
                                                <blockquote>{!!$post['contentData']->content!!}</blockquote>
                                                {{-- Quiz section start --}}
                                                @if($post['quizType'] != NULL)
                                                    @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                        {{-- question drop down --}}
                                                        @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="drop_down_QuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz section start --}}
                                                            <div class="checkDropDown">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question true false --}}
                                                        @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="trueFalseQuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz section start --}}
                                                            <div class="checkTrueFalse">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question multiple choice --}}
                                                        @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="multipleChoiceFormSubmission" method="POST">
                                                                    <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach 
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                               {{-- quiz check section --}}
                                                                <div class="checkMultipleChoice">
                                                                    @if($post['submittedQuiz'] != NULL)
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $big_loop = $loop->index;
                                                                            @endphp
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                                $correct_ans = json_decode($question->is_correct);
                                                                                $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                            @endphp
                                                                            <div class="questions_radio">
                                                                                <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                @foreach( $options as $key=>$option)
                                                                                <div class="d-flex">
                                                                                    @if(in_array( $loop->index ,$correct_ans))
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            <span class="right_radio">
                                                                                                {{$option}}
                                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            @if($correct_ans != $submitted_ans)
                                                                                                @if($key == $submitted_ans)
                                                                                                    <span class="wrong_radio">
                                                                                                        {{$option}}
                                                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                    </span>
                                                                                                @else
                                                                                                    <span class="">
                                                                                                        {{$option}}
                                    
                                                                                                    </span>
                                                                                                @endif
                                                                                            @endif
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                        @endif
                                                        {{-- question radio --}}
                                                        @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="radioQuizSubmisstion" method="POST">
                                                                    <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkRadio">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question fill in the blank --}}
                                                        @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                                <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                                <div id="">
                                                                    <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                        <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                        <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                        <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                        <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                            <div class="fill_blanks main-text">
                                                                                @if($question->is_show == 'yes')
                                                                                    @php
                                                                                        $options = json_decode($question->blank_answer);
                                                                                        shuffle($options);
                                                                                    @endphp
                                                                                    <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                        @foreach($options as $option)
                                                                                            <p class="mx-2">{{$option}}</p>
                                                                                        @endforeach
                                                                                    </div>
                                                                                @endif
                                                                                @php
                                                                                    $replace_content = "<input type='text' name='{$question->id}'>";
                                                                                @endphp
                                                                                <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                            </div>
                                                                        @endforeach
                                                                        @if(Auth::guard('customLogin')->user())
                                                                            <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                        @else
                                                                            <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkFillBlank">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->blank_answer);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                            $raw_content = explode('##blank##',$question->text);
                                                                                $processed_content = '';
                                                                                foreach ($raw_content as $key => $value) {
                                                                                    if($key==0 ){
                                                                                            $processed_content .=$value;
                                                                                    }else{
                                                                                            $show_ans = '';
                                                                                            if(strpos($options[$key-1], '/')){
                                                                                                $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                    $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                        
                                                                                        $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                        
                                                                                    }
                                                                                }
                                                                        @endphp
                                                                        {{$loop->index+1}}. {!!$processed_content!!}
                                                                        <br>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else
                                                @endif
                                                {{-- Quiz section end --}}
                                            @elseif($post['contentType'] == 'image' && $post['contentLayout'] == 'full_width')
                                                <div class="single-img">
                                                    @if($post['contentData'] != NULL)
                                                        <img src="{{asset('uploads/image_content/'.$post['contentData']->image)}}" alt="blog">
                                                    @endif
                                                </div>
                                                {{-- Quiz section start --}}
                                                @if($post['quizType'] != NULL)
                                                    @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                        {{-- question drop down --}}
                                                        @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="drop_down_QuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkDropDown">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question true false --}}
                                                        @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="trueFalseQuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkTrueFalse">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question multiple choice --}}
                                                        @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="multipleChoiceFormSubmission" method="POST">
                                                                    <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section  --}}
                                                            <div class="checkMultipleChoice">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question radio --}}
                                                        @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="radioQuizSubmisstion" method="POST">
                                                                    <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkRadio">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question fill in the blank --}}
                                                        @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                                <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                                <div id="">
                                                                    <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                        <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                        <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                        <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                        <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                            <div class="fill_blanks main-text">
                                                                                @if($question->is_show == 'yes')
                                                                                    @php
                                                                                        $options = json_decode($question->blank_answer);
                                                                                        shuffle($options);
                                                                                    @endphp
                                                                                    <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                        @foreach($options as $option)
                                                                                            <p class="mx-2">{{$option}}</p>
                                                                                        @endforeach
                                                                                    </div>
                                                                                @endif
                                                                                @php
                                                                                    $replace_content = "<input type='text' name='{$question->id}'>";
                                                                                @endphp
                                                                                <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                            </div>
                                                                        @endforeach
                                                                        @if(Auth::guard('customLogin')->user())
                                                                            <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                        @else
                                                                            <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkFillBlank">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->blank_answer);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                            $raw_content = explode('##blank##',$question->text);
                                                                                $processed_content = '';
                                                                                foreach ($raw_content as $key => $value) {
                                                                                    if($key==0 ){
                                                                                            $processed_content .=$value;
                                                                                    }else{
                                                                                            $show_ans = '';
                                                                                            if(strpos($options[$key-1], '/')){
                                                                                                $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                    $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                        
                                                                                        $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                        
                                                                                    }
                                                                                }
                                                                        @endphp
                                                                        {{$loop->index+1}}. {!!$processed_content!!}
                                                                        <br>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif    
                                                @else
                                                @endif
                                                {{-- Quiz section end --}}
                                            @elseif($post['contentType'] == 'image' && $post['contentLayout'] == 'left')
                                                <div class="row">
                                                    <div class="col-md-6">
                                                            <div class="single-img">
                                                                <img src="{{asset('uploads/image_content/'.$post['contentData']->image)}}" alt="blog">
                                                            </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div>
                                                            @elseif($post['contentType'] == 'image' && $post['contentLayout'] == 'right')
                                                            <div class="single-img">
                                                                <img src="{{asset('uploads/image_content/'.$post['contentData']->image)}}" alt="blog">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            @elseif($post['contentType'] == 'subheadline')
                                                <h2 class="">{{$post['contentData']->content}}</h2>
                                                {{-- Quiz section start        --}}
                                                @if($post['quizType'] != NULL)
                                                    <form action="{{route('quiz.submission')}}" method="POST">
                                                        @csrf
                                                        @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                            {{-- question drop down --}}
                                                            @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                                <h3>{{$post['quizTitle']}}</h3>
                                                                <p>{{$post['quizDescription']}}</p>
                                                                @foreach ($post['quizQuestionData'] as $question)
                                                                    @php
                                                                        $options = json_decode($question->option_text);
                                                                    @endphp
                                                                    <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                    <div class="questions_radio d-flex justify-content-start">
                                                                        <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                        <div class="main-text">
                                                                            <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                @foreach( $options as $key=>$option)
                                                                                    <option value="{{$key}}">{{$option}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            {{-- question true false --}}
                                                            @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                                <h3>{{$post['quizTitle']}}</h3>
                                                                <p>{{$post['quizDescription']}}</p>
                                                                @foreach ($post['quizQuestionData'] as $question)
                                                                    @php
                                                                        $options = json_decode($question->option_text);
                                                                    @endphp
                                                                    <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                    <div class="questions_radio d-flex justify-content-start">
                                                                        <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                        <div class="main-text">
                                                                            <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                @foreach( $options as $key=>$option)
                                                                                    <option value="{{$key}}">{{$option}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            {{-- question multiple choice --}}
                                                            @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                                <h3>{{$post['quizTitle']}}</h3>
                                                                <p>{{$post['quizDescription']}}</p>
                                                                @foreach ($post['quizQuestionData'] as $question)
                                                                    @php
                                                                        $big_loop = $loop->index;
                                                                    @endphp
                                                                    <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                    @php
                                                                        $options = json_decode($question->option_text);
                                                                    @endphp
                                                                    <div class="questions_radio">
                                                                        <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                        @foreach( $options as $option)
                                                                            <div class="d-flex">
                                                                                <div class="side-bar-font">
                                                                                    <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                </div>
                                                                                <div class="check_box_font">
                                                                                    <span>{{$option}}</span>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach 
                                                            @endif
                                                            {{-- question radio --}}
                                                            @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                                @foreach ($post['quizQuestionData'] as $question)
                                                                    @php
                                                                        $big_loop = $loop->index;
                                                                    @endphp
                                                                    <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                    @php
                                                                        $options = json_decode($question->option_text);
                                                                    @endphp
                                                                    <div class="questions_radio">
                                                                        <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                        @foreach( $options as $option)
                                                                            <div class="d-flex">
                                                                                <div class="side-bar-font">
                                                                                    <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                </div>
                                                                                <div class="check_box_font">
                                                                                    <span>{{$option}}</span>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                            {{-- question fill in the blank --}}
                                                            @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                                @foreach ($post['quizQuestionData'] as $question)
                                                                    <input type="hidden" name="fillBlank_question_id" value="{{$question->id}}">
                                                                    <div class="fill_blanks main-text">
                                                                        @if($question->is_show == 'yes')
                                                                            @php
                                                                                $options = json_decode($question->blank_answer);
                                                                                shuffle($options);
                                                                            @endphp
                                                                            <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                @foreach($options as $option)
                                                                                    <p class="mx-2">{{$option}}</p>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                                        <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##','<input type="text" name="user_fillBlank_ans[]" onchange="countSelected(event)">', $question->text)!!}</p>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                    </form>
                                                @else
                                                @endif
                                            @elseif($post['contentType'] == 'list-content')
                                                @php
                                                    $decode_list = json_decode($post['contentData']->content);
                                                @endphp
                                                <ol class="info-list">
                                                    @foreach ($decode_list as $list)
                                                        <li style="font-size: 18px;">{{$list}}</li>
                                                    @endforeach
                                                </ol>
                                                {{-- Quiz section start        --}}
                                                @if($post['quizType'] != NULL)
                                                        @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                            {{-- question drop down --}}
                                                            @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                                <div id="">
                                                                    <form class="drop_down_QuizSubmisstion"  method="post">
                                                                        <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                        <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                        <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                        <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                        <h3>{{$post['quizTitle']}}</h3>
                                                                        <p>{{$post['quizDescription']}}</p>
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                            @endphp
                                                                            <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                            <div class="questions_radio d-flex justify-content-start">
                                                                                <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                <div class="main-text">
                                                                                    <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                        @foreach( $options as $key=>$option)
                                                                                            <option value="{{$key}}">{{$option}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        @if(Auth::guard('customLogin')->user())
                                                                            <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                        @else
                                                                            <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                                {{-- quiz check section --}}
                                                                <div class="checkDropDown">
                                                                    @if($post['submittedQuiz'] != NULL)
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                                $correct_ans = json_decode($question->is_correct)  ;
                                                                                $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                            @endphp
                                                                            <div class="questions_radio d-flex justify-content-start">
                                                                                <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                <div class="main-text">
                                                                                    {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                        @foreach( $options as $key=>$option)
                                                                                            @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                                @if($key == $correct_ans[0])
                                                                                                    <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                                @endif
                                                                                            @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                                @if($key == $dropDown_submitted_ans)
                                                                                                    <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                    {{-- </select>  --}}
                                                                                </div>
                                                                                @foreach( $options as $key=>$option)
                                                                                    @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                        @if($key == $correct_ans[0])
                                                                                            <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            {{-- question true false --}}
                                                            @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                                <div id="">
                                                                    <form class="trueFalseQuizSubmisstion"  method="post">
                                                                        <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                        <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                        <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                        <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                        <h3>{{$post['quizTitle']}}</h3>
                                                                        <p>{{$post['quizDescription']}}</p>
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                            @endphp
                                                                            <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                            <div class="questions_radio d-flex justify-content-start">
                                                                                <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                <div class="main-text">
                                                                                    <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                        @foreach( $options as $key=>$option)
                                                                                            <option value="{{$key}}">{{$option}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        @if(Auth::guard('customLogin')->user())
                                                                            <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                        @else
                                                                            <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                                {{-- quiz check section --}}
                                                                <div class="checkTrueFalse">
                                                                    @if($post['submittedQuiz'] != NULL)
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                                $correct_ans = json_decode($question->is_correct)  ;
                                                                                $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                            @endphp
                                                                            <div class="questions_radio d-flex justify-content-start">
                                                                                <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                <div class="main-text">
                                                                                    {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                        @foreach( $options as $key=>$option)
                                                                                            @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                                @if($key == $correct_ans[0])
                                                                                                    <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                                @endif
                                                                                            @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                                @if($key == $dropDown_submitted_ans)
                                                                                                    <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                    {{-- </select>  --}}
                                                                                </div>
                                                                                @foreach( $options as $key=>$option)
                                                                                    @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                        @if($key == $correct_ans[0])
                                                                                            <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            {{-- question multiple choice --}}
                                                            @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                                <div id="">
                                                                    <form class="multipleChoiceFormSubmission" method="POST">
                                                                        <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                        <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                        <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                        <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                        <h3>{{$post['quizTitle']}}</h3>
                                                                        <p>{{$post['quizDescription']}}</p>
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $big_loop = $loop->index;
                                                                            @endphp
                                                                            <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                            @endphp
                                                                            <div class="questions_radio">
                                                                                <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                @foreach( $options as $option)
                                                                                    <div class="d-flex">
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            <span>{{$option}}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                        @if(Auth::guard('customLogin')->user())
                                                                            <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                        @else
                                                                            <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                                {{-- quiz check section  --}}
                                                                <div class="checkMultipleChoice">
                                                                    @if($post['submittedQuiz'] != NULL)
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $big_loop = $loop->index;
                                                                            @endphp
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                                $correct_ans = json_decode($question->is_correct);
                                                                                $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                            @endphp
                                                                            <div class="questions_radio">
                                                                                <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                @foreach( $options as $key=>$option)
                                                                                <div class="d-flex">
                                                                                    @if(in_array( $loop->index ,$correct_ans))
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            <span class="right_radio">
                                                                                                {{$option}}
                                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            @if($correct_ans != $submitted_ans)
                                                                                                @if($key == $submitted_ans)
                                                                                                    <span class="wrong_radio">
                                                                                                        {{$option}}
                                                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                    </span>
                                                                                                @else
                                                                                                    <span class="">
                                                                                                        {{$option}}
                                    
                                                                                                    </span>
                                                                                                @endif
                                                                                            @endif
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            {{-- question radio --}}
                                                            @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                                <div id="">
                                                                    <form class="radioQuizSubmisstion" method="POST">
                                                                        <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                        <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                        <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                        <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $big_loop = $loop->index;
                                                                            @endphp
                                                                            <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                            @endphp
                                                                            <div class="questions_radio">
                                                                                <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                @foreach( $options as $option)
                                                                                    <div class="d-flex">
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            <span>{{$option}}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                        @if(Auth::guard('customLogin')->user())
                                                                            <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                        @else
                                                                            <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                                {{-- quiz check section --}}
                                                                <div class="checkRadio">
                                                                    @if($post['submittedQuiz'] != NULL)
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $big_loop = $loop->index;
                                                                            @endphp
                                                                            @php
                                                                                $options = json_decode($question->option_text);
                                                                                $correct_ans = json_decode($question->is_correct);
                                                                                $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                            @endphp
                                                                            <div class="questions_radio">
                                                                                <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                                @foreach( $options as $key=>$option)
                                                                                <div class="d-flex">
                                                                                    @if(in_array( $loop->index ,$correct_ans))
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            <span class="right_radio">
                                                                                                {{$option}}
                                                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                                                            </span>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="side-bar-font">
                                                                                            <input type="radio" class="check_box">
                                                                                        </div>
                                                                                        <div class="check_box_font">
                                                                                            @if($correct_ans != $submitted_ans)
                                                                                                @if($key == $submitted_ans)
                                                                                                    <span class="wrong_radio">
                                                                                                        {{$option}}
                                                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                    </span>
                                                                                                @else
                                                                                                    <span class="">
                                                                                                        {{$option}}
                                    
                                                                                                    </span>
                                                                                                @endif
                                                                                            @endif
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                                @endforeach
                                                                            </div>
                                                                        @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                            {{-- question fill in the blank --}}
                                                            @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                                    <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                                    <div id="">
                                                                        <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                            <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                            <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                            <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                            <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                            @foreach ($post['quizQuestionData'] as $question)
                                                                                <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                                <div class="fill_blanks main-text">
                                                                                    @if($question->is_show == 'yes')
                                                                                        @php
                                                                                            $options = json_decode($question->blank_answer);
                                                                                            shuffle($options);
                                                                                        @endphp
                                                                                        <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                            @foreach($options as $option)
                                                                                                <p class="mx-2">{{$option}}</p>
                                                                                            @endforeach
                                                                                        </div>
                                                                                    @endif
                                                                                    @php
                                                                                        $replace_content = "<input type='text' name='{$question->id}'>";
                                                                                    @endphp
                                                                                    <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                                </div>
                                                                            @endforeach
                                                                            @if(Auth::guard('customLogin')->user())
                                                                                <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                            @else
                                                                                <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                            @endif
                                                                        </form>
                                                                    </div>
                                                                {{-- quiz check section --}}
                                                                <div class="checkFillBlank">
                                                                    @if($post['submittedQuiz'] != NULL)
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            @php
                                                                                $big_loop = $loop->index;
                                                                            @endphp
                                                                            @php
                                                                                $options = json_decode($question->blank_answer);
                                                                                $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                                $raw_content = explode('##blank##',$question->text);
                                                                                    $processed_content = '';
                                                                                    foreach ($raw_content as $key => $value) {
                                                                                        if($key==0 ){
                                                                                                $processed_content .=$value;
                                                                                        }else{
                                                                                                $show_ans = '';
                                                                                                if(strpos($options[$key-1], '/')){
                                                                                                    $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                    $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                    if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                        $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }else{
                                                                                                    $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                
                                                                                                        if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                            $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                        }
                                                                                                    }
                                                                                                }else{
                                                                                                    $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                
                                                                                                        if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                            $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                        }
                                                                                                    }
                            
                                                                                            $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                            
                                                                                        }
                                                                                    }
                                                                            @endphp
                                                                            {{$loop->index+1}}. {!!$processed_content!!}
                                                                            <br>
                                                                        @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endif
                                                @else
                                                @endif
                                                {{-- Quiz section end        --}}
                                            @elseif($post['contentType'] == 'left-text-video')
                                                @if($post['contentLayout'] == 'full_width')
                                                    <div class="embeded-content">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <h2>{{$post['contentData']->content_title}}</h2>
                                                                <p>{{substr($post['contentData']->content_text, 0,100)}}</p>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <iframe src="{{$post['contentData']->video_url}}" frameborder="0" height="180" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- Quiz section start --}}
                                                @if($post['quizType'] != NULL)
                                                    @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                        {{-- question drop down --}}
                                                        @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="drop_down_QuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkDropDown">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question true false --}}
                                                        @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="trueFalseQuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkTrueFalse">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question multiple choice --}}
                                                        @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="multipleChoiceFormSubmission" method="POST">
                                                                    <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach 
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkMultipleChoice">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question radio --}}
                                                        @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="radioQuizSubmisstion" method="POST">
                                                                    <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkRadio">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question fill in the blank --}}
                                                        @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                                <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                                <div id="">
                                                                    <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                        <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                        <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                        <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                        <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                        @foreach ($post['quizQuestionData'] as $question)
                                                                            <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                            <div class="fill_blanks main-text">
                                                                                @if($question->is_show == 'yes')
                                                                                    @php
                                                                                        $options = json_decode($question->blank_answer);
                                                                                        shuffle($options);
                                                                                    @endphp
                                                                                    <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                        @foreach($options as $option)
                                                                                            <p class="mx-2">{{$option}}</p>
                                                                                        @endforeach
                                                                                    </div>
                                                                                @endif
                                                                                @php
                                                                                    $replace_content = "<input type='text' name='{$question->id}'>";
                                                                                @endphp
                                                                                <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                            </div>
                                                                        @endforeach
                                                                        @if(Auth::guard('customLogin')->user())
                                                                            <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                        @else
                                                                            <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkFillBlank">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->blank_answer);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                            $raw_content = explode('##blank##',$question->text);
                                                                                $processed_content = '';
                                                                                foreach ($raw_content as $key => $value) {
                                                                                    if($key==0 ){
                                                                                            $processed_content .=$value;
                                                                                    }else{
                                                                                            $show_ans = '';
                                                                                            if(strpos($options[$key-1], '/')){
                                                                                                $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                    $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                        
                                                                                        $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                        
                                                                                    }
                                                                                }
                                                                        @endphp
                                                                        {{$loop->index+1}}. {!!$processed_content!!}
                                                                        <br>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else
                                                @endif
                                                {{-- Quiz section end --}}
                                            @elseif($post['contentType'] == 'right-text-video')
                                                @if($post['contentLayout'] == 'full_width')
                                                    <div class="embeded-content">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <iframe src="{{$post['contentData']->video_url}}" frameborder="0" height="180" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;"></iframe>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <h2>{{$post['contentData']->content_title}}</h2>
                                                                <p>{{substr($post['contentData']->content_text, 0,100)}}</p>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- Quiz section start --}}
                                                @if($post['quizType'] != NULL)
                                                    @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                        {{-- question drop down --}}
                                                        @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="drop_down_QuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkDropDown">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                        <div class="d-flex justify-content-center">
                                                                            <div class="result_box">
                                                                                <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                                <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                            </div>
                                                                        </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question true false --}}
                                                        @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="trueFalseQuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkTrueFalse">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question multiple choice --}}
                                                        @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="multipleChoiceFormSubmission" method="POST">
                                                                    <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section  --}}
                                                            <div class="checkMultipleChoice">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question radio --}}
                                                        @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="radioQuizSubmisstion" method="POST">
                                                                    <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkRadio">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question fill in the blank --}}
                                                        @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                            <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                            <div id="">
                                                                <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                    <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                        <div class="fill_blanks main-text">
                                                                            @if($question->is_show == 'yes')
                                                                                @php
                                                                                    $options = json_decode($question->blank_answer);
                                                                                    shuffle($options);
                                                                                @endphp
                                                                                <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                    @foreach($options as $option)
                                                                                        <p class="mx-2">{{$option}}</p>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $replace_content = "<input type='text' name='{$question->id}'>";
                                                                            @endphp
                                                                            <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkFillBlank">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->blank_answer);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                            $raw_content = explode('##blank##',$question->text);
                                                                                $processed_content = '';
                                                                                foreach ($raw_content as $key => $value) {
                                                                                    if($key==0 ){
                                                                                            $processed_content .=$value;
                                                                                    }else{
                                                                                            $show_ans = '';
                                                                                            if(strpos($options[$key-1], '/')){
                                                                                                $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                    $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                        
                                                                                        $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                        
                                                                                    }
                                                                                }
                                                                        @endphp
                                                                        {{$loop->index+1}}. {!!$processed_content!!}
                                                                        <br>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else
                                                @endif
                                                {{-- Quiz section end --}}
                                            @elseif($post['contentType'] == 'video-content' && $post['contentLayout'] == 'full_width')
                                                <div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>{{$post['contentData']->video_title}}</h4>
                                                            <iframe src="{{$post['contentData']->video_url}}" frameborder="0" width="100%" height="500" style="border-radius: 10px;"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Quiz section start --}}
                                                @if($post['quizType'] != NULL)
                                                    @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                        {{-- question drop down --}}
                                                        @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="drop_down_QuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkDropDown">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question true false --}}
                                                        @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="trueFalseQuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkTrueFalse">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question multiple choice --}}
                                                        @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="multipleChoiceFormSubmission" method="POST">
                                                                    <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section  --}}
                                                            <div class="checkMultipleChoice">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question radio --}}
                                                        @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="radioQuizSubmisstion" method="POST">
                                                                    <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkRadio">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question fill in the blank --}}
                                                        @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                            <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                            <div id="">
                                                                <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                    
                                                                    <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                        <div class="fill_blanks main-text">
                                                                            @if($question->is_show == 'yes')
                                                                                @php
                                                                                    $options = json_decode($question->blank_answer);
                                                                                    shuffle($options);
                                                                                @endphp
                                                                                <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                    @foreach($options as $option)
                                                                                        <p class="mx-2">{{$option}}</p>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $replace_content = "<input type='text' name='{$question->id}'>";
                                                                            @endphp
                                                                            <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkFillBlank">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->blank_answer);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                            $raw_content = explode('##blank##',$question->text);
                                                                                $processed_content = '';
                                                                                foreach ($raw_content as $key => $value) {
                                                                                    if($key==0 ){
                                                                                            $processed_content .=$value;
                                                                                    }else{
                                                                                            $show_ans = '';
                                                                                            if(strpos($options[$key-1], '/')){
                                                                                                $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                    $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                        
                                                                                        $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                        
                                                                                    }
                                                                                }
                                                                        @endphp
                                                                        {{$loop->index+1}}. {!!$processed_content!!}
                                                                        <br>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else 
                                                @endif
                                                {{-- Quiz section end --}}
                                            @elseif($post['contentType'] == 'audio-content' && $post['contentLayout'] == 'full_width')
                                                @if($post['contentData'] != NULL)
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>{{$post['contentData']->audio_title}}</h4>
                                                                <audio controls style="width: 100%;">
                                                                    <source src="{{asset('uploads/audio-content/'.$post['contentData']->audio)}}" type="audio/ogg">
                                                                </audio>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- Quiz section start --}}
                                                @if($post['quizType'] != NULL)
                                                    @if ($post['contentData']->article_content_id == $post['quizContentId'] )
                                                        {{-- question drop down --}}
                                                        @if ($post['quizQuestionType'] == 'drop_down' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="drop_down_QuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_drop_down" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_drop_down" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_drop_down" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_drop_down" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkDropDown">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question true false --}}
                                                        @if ($post['quizQuestionType'] == 'true_false_not_given' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="trueFalseQuizSubmisstion"  method="post">
                                                                    <input type="hidden" name="quiz_id_true_false" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_true_false" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_true_false" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_true_false" value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <input type="hidden" name="dropDown_question_id[]" value="{{$question->id}}">
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                <select name="user_dropDown_ans[]" id="" class="drop_down_select" onChange="countSelected(event)" required>
                                                                                    @foreach( $options as $key=>$option)
                                                                                        <option value="{{$key}}">{{$option}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkTrueFalse">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct)  ;
                                                                            $dropDown_submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio d-flex justify-content-start">
                                                                            <p class="check_box_font" style="margin-bottom: 0">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            <div class="main-text">
                                                                                {{-- <select name="" id="" class="drop_down_select"> --}}
                                                                                    @foreach( $options as $key=>$option)
                                                                                        @if( $correct_ans[0] == $dropDown_submitted_ans )
                                                                                            @if($key == $correct_ans[0])
                                                                                                <p style="color: #00c437; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @elseif($correct_ans[0] != $dropDown_submitted_ans)
                                                                                            @if($key == $dropDown_submitted_ans)
                                                                                                <p style="color: #f40505; font-size:1.5rem; font-weight:700; margin:0 10px;">{{$option}} <i class="fa fa-times" aria-hidden="true"></i></p>
                                                                                            @endif
                                                                                        @endif
                                                                                    @endforeach
                                                                                {{-- </select>  --}}
                                                                            </div>
                                                                            @foreach( $options as $key=>$option)
                                                                                @if($correct_ans[0] != $dropDown_submitted_ans)
                                                                                    @if($key == $correct_ans[0])
                                                                                        <span class="right_drop mx-2" >{{$option}} <i class="fa fa-check right_radio" aria-hidden="true"></i></span>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question multiple choice --}}
                                                        @if($post['quizQuestionType'] == 'multiple_choice' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="multipleChoiceFormSubmission" method="POST">
                                                                    <input type="hidden" name="quiz_id_multiple_choice" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_multiple_choice" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_multiple_choice" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_multiple_choice"  value="{{$post['quizType']}}">
                                                                    <h3>{{$post['quizTitle']}}</h3>
                                                                    <p>{{$post['quizDescription']}}</p>
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="multiple_choice_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="multipleChoiceAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section  --}}
                                                            <div class="checkMultipleChoice">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question radio --}}
                                                        @if($post['quizQuestionType'] == 'radio' && $post['quizType'] == 'general')
                                                            <div id="">
                                                                <form class="radioQuizSubmisstion" method="POST">
                                                                    <input type="hidden" name="quiz_id_radio" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_radio" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_radio" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_radio"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        <input type="hidden" name="radio_question_id[]" value="{{$question->id}}">
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $option)
                                                                                <div class="d-flex">
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" name="radioAns[{{$question->id}}][]" value="{{$loop->index}}" onclick="countSelected(event)" required>
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span>{{$option}}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <button class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkRadio">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->option_text);
                                                                            $correct_ans = json_decode($question->is_correct);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->submitted_ans);
                                                                        @endphp
                                                                        <div class="questions_radio">
                                                                            <p class="check_box_font" style="margin-bottom:0;">{{$loop->index+1}}. {{$question->text}}</p>
                                                                            @foreach( $options as $key=>$option)
                                                                            <div class="d-flex">
                                                                                @if(in_array( $loop->index ,$correct_ans))
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box" checked="checked" style="accent-color:green;">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        <span class="right_radio">
                                                                                            {{$option}}
                                                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="side-bar-font">
                                                                                        <input type="radio" class="check_box">
                                                                                    </div>
                                                                                    <div class="check_box_font">
                                                                                        @if($correct_ans != $submitted_ans)
                                                                                            @if($key == $submitted_ans)
                                                                                                <span class="wrong_radio">
                                                                                                    {{$option}}
                                                                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                                                                </span>
                                                                                            @else
                                                                                                <span class="">
                                                                                                    {{$option}}
                                
                                                                                                </span>
                                                                                            @endif
                                                                                        @endif
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                        {{-- question fill in the blank --}}
                                                        @if($post['quizQuestionType'] == 'fill_blank' && $post['quizType'] == 'general')
                                                            <p style="font-size: 1.5rem; margin-top: 1.5rem; margin-bottom: 0; font-weight:700;">Fill in the blanks</p>
                                                            <div id="">
                                                                <form class="fillBlankQuizSubmisstion" method="POST" id="fillBlankForm">
                                                                    <input type="hidden" name="quiz_id_fill_blank" value="{{$post['quizId']}}">
                                                                    <input type="hidden" name="quiz_content_id_fill_blank" value="{{$post['quizContentId']}}">
                                                                    <input type="hidden" name="question_type_fill_blank" value="{{$post['quizQuestionType']}}">
                                                                    <input type="hidden" name="quiz_type_fill_blank"  value="{{$post['quizType']}}">
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        <input type="hidden" name="fillBlank_question_id[]" value="{{$question->id}}">
                                                                        <div class="fill_blanks main-text">
                                                                            @if($question->is_show == 'yes')
                                                                                @php
                                                                                    $options = json_decode($question->blank_answer);
                                                                                    shuffle($options);
                                                                                @endphp
                                                                                <div class="d-flex justify-content-start fw-bold main-text" style="width: 50%;">
                                                                                    @foreach($options as $option)
                                                                                        <p class="mx-2">{{$option}}</p>
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $replace_content = "<input type='text' name='{$question->id}'>";
                                                                            @endphp
                                                                            <p style="font-size: 1.5rem; margin-top: 1rem;">{{$loop->index+1}}. {!!str_replace('##blank##',$replace_content, $question->text)!!}</p>
                                                                        </div>
                                                                    @endforeach
                                                                    @if(Auth::guard('customLogin')->user())
                                                                        <button type="submit" class="btn btn-success btn-lg px-4 fw-bold mt-4">Check</button>
                                                                    @else
                                                                        <a href="#" class="btn btn-success btn-lg px-4 fw-bold mt-4 loginQuizSubmission" id="">Check</a>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                            {{-- quiz check section --}}
                                                            <div class="checkFillBlank">
                                                                @if($post['submittedQuiz'] != NULL)
                                                                    @foreach ($post['quizQuestionData'] as $question)
                                                                        @php
                                                                            $big_loop = $loop->index;
                                                                        @endphp
                                                                        @php
                                                                            $options = json_decode($question->blank_answer);
                                                                            $submitted_ans = json_decode($post['submittedQuiz'][$loop->index]->answered_text);
                                                                            $raw_content = explode('##blank##',$question->text);
                                                                                $processed_content = '';
                                                                                foreach ($raw_content as $key => $value) {
                                                                                    if($key==0 ){
                                                                                            $processed_content .=$value;
                                                                                    }else{
                                                                                            $show_ans = '';
                                                                                            if(strpos($options[$key-1], '/')){
                                                                                                $explode_correct_ans = explode('/', $options[$key-1]);
                                                                                                $convert_arr = array_map('strtolower', $explode_correct_ans);
                                                                                                if(in_array(strtolower($submitted_ans[$key-1]), $convert_arr)){
                                                                                                    $show_ans = $submitted_ans[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                                                                                            }else{
                                                                                                $show_ans = $options[$key-1] . '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                            
                                                                                                    if(strtolower($options[$key-1]) != strtolower($submitted_ans[$key-1])){
                                                                                                        $show_ans = '<span style="border-bottom: 2px solid red; color:red">'.$submitted_ans[$key-1].'<i class="fa fa-times wrong_radio mx-2" aria-hidden="true"></i>'.'</span>'."&emsp; " .$options[$key-1]. '<i class="fa fa-check right_radio mx-2" aria-hidden="true"></i>';
                                                                                                    }
                                                                                                }
                        
                                                                                        $processed_content .= '<span>' . '<span style="border-bottom: 2px solid #00c437; color:#00c437">'.$show_ans.'</span>'.' '.    $value .'</span>';
                        
                                                                                    }
                                                                                }
                                                                        @endphp
                                                                        {{$loop->index+1}}. {!!$processed_content!!}
                                                                        <br>
                                                                    @endforeach
                                                                    <div class="d-flex justify-content-center">
                                                                        <div class="result_box">
                                                                            <p style="margin-bottom: 0; font-weight:700;">Total Question- {{$post['countQuestion']}}</p>
                                                                            <p style="margin-bottom: 0; font-weight:700;">Your result for {{$post['quizQuestionType']}} Section  is {{$post['submissionObtainMarks']}}/{{$post['totalMarks']}}</p>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endif
                                                @else
                                                @endif
                                                {{-- Quiz section end --}}
                                            @endif
                                    </div>
                                @endforeach
                            @else
                                <p>No data found</p>
                            @endif
                            {{-- footer --}}
                            @include('theme.blogxer2.pages.details_page_segment.footer-details-page')
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        {{-- details page right side bar start --}}
                        @include('theme.blogxer2.pages.details_page_segment.right-side-bar-details-page')
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Single Blog Banner End Here -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- newsLetter submission --}}
<script>
    $(document).ready(function(){
      $("#newsLetterSubmission").submit(function(e){
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
{{-- comment submission --}}
<script>
     $(document).ready(function(){
        $("#commentSubmitForm").submit(function(e){
            e.preventDefault();
            $.ajax({
                    type:'POST',
                    url:"{{route('comment.submission')}}",
                    data:{"action":"comments", comment:$("#message").val(), article_id:$("#article_id").val(), "_token": "{{ csrf_token() }}"},
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
{{-- reply comment box --}}
<script>
    function replyButton(id) {
        var x = document.getElementById("replyForm_"+id);
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
{{-- reply comment submission --}}
<script>
    $(document).ready(function(){
        $("#replyFormSubmitt").submit(function(e){
            e.preventDefault();
            $.ajax({
                    type:'POST',
                    url:"{{route('comment.reply')}}",
                    data:{"action":"replyComment", comment:$("#replyMessage").val(), article_id:$("#article_id").val(),comment_id:$("#comment_id").val(), "_token": "{{ csrf_token() }}"},
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
{{-- giving like  --}}
<script>
    $(document).on('click','#saveLikeDislike',function(){
        var _post=$(this).data('post');
        var _type=$(this).data('type');
        var vm=$(this);
        var clicks = "{{$likes === NULL? 0 : $likes->likes}}";
        
        clicks ++;
        document.getElementById("clicks").innerHTML = clicks;
        // Run Ajax
        $.ajax({
            url:"{{ url('save-likedislike') }}",
            type:"post",
            dataType:'json',
            data:{
                post:_post,
                type:_type,
                count: clicks,
                _token:"{{ csrf_token() }}"
            },
            beforeSend:function(){
                vm.addClass('disabled');
            },
            success:function(res){
                if(res.bool==true){
                    vm.removeClass('disabled').addClass('active');
                    vm.removeAttr('id');
                    var _prevCount=$("."+_type+"-count").text();
                    _prevCount++;
                    $("."+_type+"-count").text(_prevCount);
                }
            }   
        });     
    });
</script>
{{-- scroll endicator --}}
<script>
    // window.onscroll = function() {myFunction()};
    // function myFunction() {
    //     var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    //     var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    //     var scrolled = (winScroll / height) * 100;
    //     document.getElementById("myBar").style.width = scrolled + "%";
    // }
</script>


{{-- login and registration form show hide --}}
<script>
    // $(document).ready(function(){
    //     $("#register-form").hide();
    //     $("#login-button").addClass('login-registrartion-button_li_active');
    //     $("#login-button").click(function(){
    //         $("#login-form").show();
    //         $("#login-registrartion-button").show();
    //         $("#register-form").hide();
    //         $("#login-button").addClass('login-registrartion-button_li_active');
    //         $("#registration-button").removeClass('login-registrartion-button_li_active');
    //     });
    //     $("#registration-button").click(function(){
    //         $("#login-form").hide();
    //         $("#login-registrartion-button").show();
    //         $("#register-form").show();
    //         $("#registration-button").addClass('login-registrartion-button_li_active');
    //         $("#login-button").removeClass('login-registrartion-button_li_active');
    //     });
        
    // });
</script>
<script>
    $(document).ready(function(){
        $(".loginQuizSubmission").click(function(){
            $("#authenticationModal").modal('show');
        });
        
    });
</script>

{{-- login --}}
<script>
     
   $(document).ready(function(){
    $("#commentLogin").click(function(){
        $("#authenticationModal").modal('show');
    });
    $("#replyCommentLogin").click(function(){
        $("#authenticationModal").modal('show');
    });
   
//   $("#userLogin").submit(function(e){
//     e.preventDefault();
//     $.ajax({
//             type:'POST',
//             url:"{{route('custom.login')}}",
//             data:{"action":"login", email:$("#user_email").val(), password:$("#user_password").val(), "_token": "{{ csrf_token() }}"},
//             dataType: 'json',
//             headers: {
//                 // "Authorization": "Bearer "+token,
//                 "Accept": "application/json"
//             },
//             success: function(data){		
//                 console.log(data);
//                 window.location.reload();
//                 Swal.fire(
//                 'Login Successful',
//                 'You clicked the button!',
//                 'success'
//                 )
//             },
//             error: function(data){
//                 console.log(data);
//                 $('#errorMsg').show();
//             }
//         });

//     return false;
//   });
});
</script>
{{-- registration --}}
<script>
    $(document).ready(function(){
     
    });
</script>
{{-- quiz submission --}}
{{-- multiple choice submission --}}
<script>
    $(document).ready(function(){ 
      $(".multipleChoiceFormSubmission").submit(function(e){
        e.preventDefault();
        var quiz_id_multiple_choice = $('input[name="quiz_id_multiple_choice"]').val();
        var quiz_content_id_multiple_choice = $('input[name="quiz_content_id_multiple_choice"]').val();
        var question_type_multiple_choice = $('input[name="question_type_multiple_choice"]').val();
        var quiz_type_multiple_choice = $('input[name="quiz_type_multiple_choice"]').val();

        var multiple_choice_question_id = $("[name^='multiple_choice_question_id']").map(function() { return $(this).val() }).get();
        var multipleChoiceAns = $("[name^='multipleChoiceAns']:checked").map(function() { return $(this).val() }).get();
        $.ajax({
                type:'post',
                url:"{{route('quiz.submission')}}",
                data:{"action":"quizSubmission", quiz_id:quiz_id_multiple_choice, quiz_content_id:quiz_content_id_multiple_choice, question_type:question_type_multiple_choice, quiz_type:quiz_type_multiple_choice, multiple_choice_question_id:multiple_choice_question_id, multipleChoiceAns:multipleChoiceAns, "_token": "{{ csrf_token() }}"},
                dataType: 'json',
                headers: {
                    // "Authorization": "Bearer "+token,
                    "Accept": "application/json"
                },
                success: function(data){
                    $('#formMultipleChoice').hide();
                    console.log(data);
                    window.location.reload();
                        let timerInterval
                        Swal.fire({
                        title: 'Quiz Submitted Successfully',
                        html: 'Click ok button close the modal',
                        timer: 5000,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            Swal.getHtmlContainer().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.timer
                        ) {
                            console.log('I was closed by the timer')
                        }
                        })
  
                },
                error: function(data){
                    console.log(data);
                    $('#errorMsg').show();
                }
            });

        return false;
      });
    });
</script>
{{-- drop down submission --}}
<script>
    $(document).ready(function(){
      $(".drop_down_QuizSubmisstion").submit(function(e){
        e.preventDefault();
        
        var quiz_id_text = $('input[name="quiz_id_drop_down"]').val();
        var quiz_content_id_text = $('input[name="quiz_content_id_drop_down"]').val();
        var question_type_text = $('input[name="question_type_drop_down"]').val();
        var quiz_type_text = $('input[name="quiz_type_drop_down"]').val();

        // var multiple_choice_question_id_text = $("[name^='multiple_choice_question_id']").map(function() { return $(this).val() }).get();
        // var multipleChoiceAns_text = $("[name^='multipleChoiceAns']:checked").map(function() { return $(this).val() }).get();
        // var radio_question_id_text = $("[name^='radio_question_id']").map(function() { return $(this).val() }).get();
        // var radioAns_text = $("[name^='radioAns']:checked").map(function() { return $(this).val() }).get();
        var dropDown_question_id_text = $("[name^='dropDown_question_id']").map(function() { return $(this).val() }).get();
        var dropDown_ans_text = $("[name^='dropDown_ans']").map(function() { return $(this).val() }).get();
        // var true_false_question_id_text = $("[name^='true_false_question_id']").map(function() { return $(this).val() }).get();
        // var true_false_ans_text = $("[name^='true_false_ans']").map(function() { return $(this).val() }).get();
        $.ajax({
                type:'post',
                url:"{{route('quiz.submission')}}",
                data:{"action":"quizSubmission_text", quiz_id:quiz_id_text, quiz_content_id:quiz_content_id_text, question_type:question_type_text, quiz_type:quiz_type_text, dropDown_question_id:dropDown_question_id_text, dropDown_ans:dropDown_ans_text, "_token": "{{ csrf_token() }}"},
                dataType: 'json',
                headers: {
                    // "Authorization": "Bearer "+token,
                    "Accept": "application/json"
                },
                success: function(data){
                    $('#formDropDown').hide();		
                    console.log(data);
                    window.location.reload();
                        let timerInterval
                        Swal.fire({
                        title: 'Quiz Submitted Successfully',
                        html: 'Click ok button close the modal',
                        timer: 5000,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            Swal.getHtmlContainer().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.timer
                        ) {
                            console.log('I was closed by the timer')
                        }
                        })
  
                },
                error: function(data){
                    console.log(data);
                    $('#errorMsg').show();
                }
            });

        return false;
      });
    });
</script>
{{-- true false submission --}}
<script>
    $(document).ready(function(){ 
      $(".trueFalseQuizSubmisstion").submit(function(e){
        e.preventDefault();
        
        var quiz_id_true_false = $('input[name="quiz_id_true_false"]').val();
        var quiz_content_id_true_false = $('input[name="quiz_content_id_true_false"]').val();
        var question_type_true_false = $('input[name="question_type_true_false"]').val();
        var quiz_type_true_false = $('input[name="quiz_type_true_false"]').val();

        // var multiple_choice_question_id_text = $("[name^='multiple_choice_question_id']").map(function() { return $(this).val() }).get();
        // var multipleChoiceAns_text = $("[name^='multipleChoiceAns']:checked").map(function() { return $(this).val() }).get();
        // var radio_question_id_text = $("[name^='radio_question_id']").map(function() { return $(this).val() }).get();
        // var radioAns_text = $("[name^='radioAns']:checked").map(function() { return $(this).val() }).get();
        var true_false_question_id = $("[name^='true_false_question_id']").map(function() { return $(this).val() }).get();
        var true_false_ans = $("[name^='true_false_ans']").map(function() { return $(this).val() }).get();
        $.ajax({
                type:'post',
                url:"{{route('quiz.submission')}}",
                data:{"action":"quizSubmission_text", quiz_id:quiz_id_true_false, quiz_content_id:quiz_content_id_true_false, question_type:question_type_true_false, quiz_type:quiz_type_true_false, trueFalse_question_id:true_false_question_id, trueFalse_ans:true_false_ans, "_token": "{{ csrf_token() }}"},
                dataType: 'json',
                headers: {
                    // "Authorization": "Bearer "+token,
                    "Accept": "application/json"
                },
                success: function(data){
                    $('#formTrueFalse').hide();
                    console.log(data);
                    window.location.reload();
                        let timerInterval
                        Swal.fire({
                        title: 'Quiz Submitted Successfully',
                        html: 'Click ok button close the modal',
                        timer: 5000,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            Swal.getHtmlContainer().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.timer
                        ) {
                            console.log('I was closed by the timer')
                        }
                        })
  
                },
                error: function(data){
                    console.log(data);
                    $('#errorMsg').show();
                }
            });

        return false;
      });
    });
</script>
{{-- radio submission --}}
<script>
    $(document).ready(function(){
      $(".radioQuizSubmisstion").submit(function(e){
        e.preventDefault();
        
        var quiz_id_radio = $('input[name="quiz_id_radio"]').val();
        var quiz_content_id_radio = $('input[name="quiz_content_id_radio"]').val();
        var question_type_radio = $('input[name="question_type_radio"]').val();
        var quiz_type_radio = $('input[name="quiz_type_radio"]').val();

        var radio_question_id = $("[name^='radio_question_id']").map(function() { return $(this).val() }).get();
        var radioAns = $("[name^='radioAns']:checked").map(function() { return $(this).val() }).get();
        $.ajax({
                type:'post',
                url:"{{route('quiz.submission')}}",
                data:{"action":"quizSubmission_text", quiz_id:quiz_id_radio, quiz_content_id:quiz_content_id_radio, question_type:question_type_radio, quiz_type:quiz_type_radio, radio_question_id:radio_question_id, radioAns:radioAns, "_token": "{{ csrf_token() }}"},
                dataType: 'json',
                headers: {
                    // "Authorization": "Bearer "+token,
                    "Accept": "application/json"
                },
                success: function(data){
                    $('#formRadio').hide();	
                    console.log(data);
                    window.location.reload();
                        let timerInterval
                        Swal.fire({
                        title: 'Quiz Submitted Successfully',
                        html: 'Click ok button close the modal',
                        timer: 5000,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            Swal.getHtmlContainer().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.timer
                        ) {
                            console.log('I was closed by the timer')
                        }
                        })
  
                },
                error: function(data){
                    console.log(data);
                    $('#errorMsg').show();
                }
            });

        return false;
      });
    });
</script>
{{-- fill blank submission --}}
<script>
    $(document).ready(function(){
        $(".fillBlankQuizSubmisstion").submit(function(e){
            e.preventDefault();
            var quiz_id_fill_blank = $('input[name="quiz_id_fill_blank"]').val();
            var quiz_content_id_fill_blank = $('input[name="quiz_content_id_fill_blank"]').val();
            var question_type_fill_blank = $('input[name="question_type_fill_blank"]').val();
            var quiz_type_fill_blank = $('input[name="quiz_type_fill_blank"]').val();

            var fillBlank_question_id = $("[name^='fillBlank_question_id']").map(function() { return $(this).val() }).get();
            //var fillBlank_ans = $("[name^='fillBlank_ans']").map(function() { return $(this).val() }).get();
            var my_form_data =  $('#fillBlankForm').serializeArray();
       
            $.ajax({
                type:'post',
                url:"{{route('quiz.submission')}}",
                data:{"action":"quizSubmission_text", quiz_id:quiz_id_fill_blank, quiz_content_id:quiz_content_id_fill_blank, question_type:question_type_fill_blank, quiz_type:quiz_type_fill_blank, fillBlank_question_id:fillBlank_question_id, fillBlank_ans:my_form_data, "_token": "{{ csrf_token() }}"},
                dataType: 'json',
                headers: {
                    // "Authorization": "Bearer "+token,
                    "Accept": "application/json"
                },
                success: function(data){
                    $('#formFillBlank').hide();
                    console.log(data);
                    window.location.reload();
                        let timerInterval
                        Swal.fire({
                        title: 'Quiz Submitted Successfully',
                        html: 'Click ok button close the modal',
                        timer: 5000,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            Swal.getHtmlContainer().querySelector('strong')
                                .textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        onClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.timer
                        ) {
                            console.log('I was closed by the timer')
                        }
                        })
  
                },
                error: function(data){
                    console.log(data);
                    $('#errorMsg').show();
                }
            });
            return false;
      });
    });
</script>
