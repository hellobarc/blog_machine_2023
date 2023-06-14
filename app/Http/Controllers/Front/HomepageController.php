<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Resources\ArticleResource;
use App\Interfaces\ArticleRepositoryInterface;
use Auth;
use App\Models\{
                    Category,
                    ArticleContent,
                    TextContent,
                    ImageContent,
                    RightTextVideo,
                    LeftTextVideo,
                    Comment,
                    VideoContent,
                    AudioContent,
                    LikeArticle,
                    HitCounter,
                    Tags,
                    ArticleFaq,
                };

use App\Models\Quiz\{
                    Quiz,
                    QuizDropDown,
                    QuizFillBlank,
                    QuizMultipleChoice,
                    QuizRadio,
                    QuizTrueFalse,
                    QuizSubmissionLog,
                    QuizSubmission,
                };
class HomepageController extends Controller
{

    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->theme_name = env('SITE_THEME');
    }

    public function homepage(){
        $meta['title'] = 'IELTS.Live';
        $meta['description'] = 'Home Page Description';
        $meta['tags'] = ['tag1','tag2','tag3'];
        $meta['created_at'] = date('d-m-Y');
        $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];
        $featured_post = $this->articleRepository->getFeaturedPost();
        $trending_post = $this->articleRepository->premiumPost();
        $popular_post = $this->articleRepository->popularPost();
        $latest_post = $this->articleRepository->getLatestPost();
        $paginate_post = $this->articleRepository->getPaginate(8);
        $latestSingleFeaturePost = $this->articleRepository->latestSingleFeaturePost();
        $randomThreeFeaturePost = $this->articleRepository->randomThreeFeaturePost();
        $topLikesPost = $this->articleRepository->topRatingPost();
        $categories = Category::with('articles')->take(8)->get();
        return view('theme.'.$this->theme_name.'.pages.home')->with(['meta'=>$meta,'featured_post'=>$featured_post,'trending_post'=>$trending_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post, 'latestSingleFeaturePost'=>$latestSingleFeaturePost, 'randomThreeFeaturePost'=>$randomThreeFeaturePost, 'categories'=>$categories, 'topLikesPost'=>$topLikesPost] );
    }

    public function about()
    {
        $all_post = $this->articleRepository->getAll();
        return view('theme.'.$this->theme_name.'.pages.about')->with(['all_post'=>$all_post]);
    }

    public function contact(){

        $popular_post = $this->articleRepository->popularPost();
        $singleCategoryPopularPost = $this->articleRepository->singleCategoryPopularPost();
        $categories = Category::inRandomOrder()->take(7)->get();
        $tags = Tags::inRandomOrder()->take(17)->get();
        
        return view('theme.'.$this->theme_name.'.pages.contact')->with(['popular_post'=>$popular_post,'singleCategoryPopularPost'=>$singleCategoryPopularPost, 'categories'=>$categories, 'allTags'=>$tags]);
    }
    public function category($id){

        $category = Category::findOrFail($id);

        $cat_id = $category->id;
        $cat_name = $category->cat_name;
        $meta_description = $category->meta_description;
        $meta_keyword = $category->meta_keyword;

        $meta['title'] = $cat_name;
        $meta['description'] =  $meta_description ;

        $meta['slug'] = Str::slug( $cat_name ,"-");
        $meta['tags'] =   explode(" ",$meta_keyword);

        $meta['created_at'] = date('d-m-Y');
        $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];

        $featured_post = $this->articleRepository->getFeaturedPost($cat_id);
        $premium_post = $this->articleRepository->premiumPost();
        $popular_post = $this->articleRepository->popularPost();
        $latest_post = $this->articleRepository->getLatestPost();
        $paginate_post = $this->articleRepository->getPaginate(3);
        $categoriesArticle = $this->articleRepository->categoryArticle($id);
        $latestCategoryArticle = $this->articleRepository->latestCategoryArticle($id);
        $singleCategoryPopularPost = $this->articleRepository->singleCategoryPopularPost();
        $categories = Category::all();
        $tags = Tags::inRandomOrder()->take(17)->get();
        
        return view('theme.'.$this->theme_name.'.pages.category')->with(['meta'=>$meta,'category'=>$category,'featured_post'=>$featured_post,'premium_post'=>$premium_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post, 'categoriesArticle'=>$categoriesArticle, 'latestCategoryArticle'=>$latestCategoryArticle, 'singleCategoryPopularPost'=>$singleCategoryPopularPost, 'categories'=>$categories, 'allTags'=>$tags]);
    }
    public function tags($id){

        $tag = Tags::findOrFail($id);

        $tag_id = $tag->id;
        $tag_name = $tag->name;
        $meta_description = '$tag->meta_description';
        $meta_keyword = '$tag->meta_keyword';

        $meta['title'] = $tag_name;
        $meta['description'] =  $meta_description ;

        $meta['slug'] = Str::slug( $tag_name ,"-");
        $meta['tags'] =   explode(" ",$meta_keyword);

        $meta['created_at'] = date('d-m-Y');
        $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];

        $featured_post = $this->articleRepository->getFeaturedPost($tag_id);
        $premium_post = $this->articleRepository->premiumPost();
        $popular_post = $this->articleRepository->popularPost();
        $latest_post = $this->articleRepository->getLatestPost();
        $paginate_post = $this->articleRepository->getPaginate(3);
        $categoriesArticle = $this->articleRepository->categoryArticle($id);
        $latestCategoryArticle = $this->articleRepository->latestCategoryArticle($id);
        $singleCategoryPopularPost = $this->articleRepository->singleCategoryPopularPost();
        $findTagArticle = $this->articleRepository->findTagArticle($id);
        $categories = Category::with('articles')->get();
        $tags = Tags::inRandomOrder()->take(17)->get();

        return view('theme.'.$this->theme_name.'.pages.tags')->with(['meta'=>$meta,'tag'=>$tag,'featured_post'=>$featured_post,'premium_post'=>$premium_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post, 'categoriesArticle'=>$categoriesArticle, 'latestCategoryArticle'=>$latestCategoryArticle, 'singleCategoryPopularPost'=>$singleCategoryPopularPost, 'categories'=>$categories, 'allTags'=>$tags, 'findTagArticle'=>$findTagArticle]);
    }


    public function search(Request $request){

        //$keyword = $request->query('keyword');
        $keyword = $request->keyword;
        //dd(  $keyword);

        // $category = Category::findOrFail($id);

        // $cat_id = $category->id;
        // $cat_name = $category->cat_name;
        // $meta_description = $category->meta_description;
        // $meta_keyword = $category->meta_keyword;

        // $meta['title'] = 'Category Page | ' .  $cat_name;
        // $meta['description'] =  $meta_description ;
        // $meta['tags'] =   explode(" ",$meta_keyword) ;
        // $meta['created_at'] = date('d-m-Y');
        // $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];

        // $featured_post = $this->articleRepository->getFeaturedPost($cat_id);
        $premium_post = $this->articleRepository->premiumPost();
        $popular_post = $this->articleRepository->popularPost();
        $latest_post = $this->articleRepository->getLatestPost();
        $paginate_post = $this->articleRepository->getPaginate(3);
        $search_article = $this->articleRepository->searchPost($keyword);
        $singleCategoryPopularPost = $this->articleRepository->singleCategoryPopularPost();
        $categories = Category::with('articles')->get();
        $tags = Tags::inRandomOrder()->take(17)->get();
        // return view('theme.'.$this->theme_name.'.pages.search_page')->with(['meta'=>$meta,'category'=>$category,'featured_post'=>$featured_post,'premium_post'=>$premium_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post, 'search_article'=>$search_article] );
        return view('theme.'.$this->theme_name.'.pages.search_page')->with(['search_keyword'=>$keyword,'premium_post'=>$premium_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post, 'search_article'=>$search_article, 'singleCategoryPopularPost'=>$singleCategoryPopularPost, 'categories'=>$categories, 'allTags'=>$tags]);
    }



    public function detail(Request $request, $id, $slug){

        $detail_post  =    $this->articleRepository->detailsPost($id);
        $related_post  =    $this->articleRepository->relatedPost($id);
        $popular_post  =    $this->articleRepository->popularPost();
        $meta['title'] = $detail_post[0]->title;
        $meta['description'] =  $detail_post[0]->meta_description;
        $meta['tags'] =   explode(" ",$detail_post[0]->tags) ;
        $meta['created_at'] = $detail_post[0]->created_at->format("Y-m-d");
        // $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];
        $meta['images'] = [$detail_post[0]->thumbnail, $detail_post[0]->thumbnail];
        
        $this->hitCounter($id);
        $articleContent = ArticleContent::where('article_id', $id)->get();

        $data = [];
        foreach($articleContent as $rows){
            $articleContentId = $rows->id;
            $content_type = $rows->content_type;
            $content_layout = $rows->layout;
            
            if($content_type == 'text'){
                $contentData = TextContent::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'quote'){
                $contentData = TextContent::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'subheadline'){
                $contentData = TextContent::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'list-content'){
                $contentData = TextContent::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'image'){
                $contentData = ImageContent::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'left-text-video'){
                $contentData = LeftTextVideo::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'right-text-video'){
                $contentData = RightTextVideo::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'video-content'){
                $contentData = VideoContent::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }elseif($content_type == 'audio-content'){
                $contentData = AudioContent::where('article_id', $id)->where('article_content_id', $articleContentId)->first();
            }
            $quizzes = Quiz::where('article_id', $id)->where('article_content_id',  $articleContentId)->where('status', 'active')->get();
            $quizQuestionData = [];
            $quiz_question_type = [];
            $quizId = [];
            $quizTitle = [];
            $quizDescription = [];
            $quizType = [];
            $quizContentId = [];
            $submittedQuiz = [];
            $countQuestion = 0;
            $totalMarks = 0;
            $submissionObtainMarks = 0;
            $auth_user = Auth::guard('customLogin')->user();
            foreach($quizzes as $rows){
                $quiz_question_type = $rows->question_type;
                $quizId = $rows->id;
                $quizType = $rows->quiz_type;
                $quizTitle = $rows->title;
                $quizDescription = $rows->description;
                $quizContentId = $rows->article_content_id;
                if($quiz_question_type == 'multiple_choice'){
                    $quizQuestionData = QuizMultipleChoice::where('quiz_id', $quizId)->get();
                    $countQuestion += count($quizQuestionData);
                    $totalMarks += $quizQuestionData->sum('marks');
                    //quiz submission
                    if($auth_user){
                        $logDB = QuizSubmissionLog::where('quiz_id', $quizId)->where('user_id', $auth_user->id)->first();
                    }
                    
                    if(!empty($logDB)){
                        $logid = $logDB->id;
                        $submittedQuiz = QuizSubmission::where('quiz_submission_log_id', $logid)->get();
                       $submissionObtainMarks += $submittedQuiz->sum('obtained_marks');
                    }
                }elseif($quiz_question_type == 'drop_down'){
                    $quizQuestionData = QuizDropDown::where('quiz_id', $quizId)->get();
                    $countQuestion += count($quizQuestionData);
                    $totalMarks += $quizQuestionData->sum('marks');
                    //quiz submission
                    if($auth_user){
                        $logDB = QuizSubmissionLog::where('quiz_id', $quizId)->where('user_id', $auth_user->id)->first();
                    }
                    if(!empty($logDB)){
                        $logid = $logDB->id;
                        $submittedQuiz = QuizSubmission::where('quiz_submission_log_id', $logid)->get();
                        $submissionObtainMarks += $submittedQuiz->sum('obtained_marks');
                    }
                }elseif($quiz_question_type == 'true_false_not_given'){
                    $quizQuestionData = QuizTrueFalse::where('quiz_id', $quizId)->get();
                    $countQuestion += count($quizQuestionData);
                    $totalMarks += $quizQuestionData->sum('marks');
                    //quiz submission
                    if($auth_user){
                        $logDB = QuizSubmissionLog::where('quiz_id', $quizId)->where('user_id', $auth_user->id)->first();
                    }
                    if(!empty($logDB)){
                        $logid = $logDB->id;
                        $submittedQuiz = QuizSubmission::where('quiz_submission_log_id', $logid)->get();
                        $submissionObtainMarks += $submittedQuiz->sum('obtained_marks');
                    }
                }elseif($quiz_question_type == 'radio'){
                    $quizQuestionData = QuizRadio::where('quiz_id', $quizId)->get();
                    $countQuestion += count($quizQuestionData);
                    $totalMarks += $quizQuestionData->sum('marks');
                    //quiz submission
                    if($auth_user){
                        $logDB = QuizSubmissionLog::where('quiz_id', $quizId)->where('user_id', $auth_user->id)->first();
                    }
                    if(!empty($logDB)){
                        $logid = $logDB->id;
                        $submittedQuiz = QuizSubmission::where('quiz_submission_log_id', $logid)->get();
                        $submissionObtainMarks += $submittedQuiz->sum('obtained_marks');
                    }
                }elseif($quiz_question_type == 'fill_blank'){
                    $quizQuestionData = QuizFillBlank::where('quiz_id', $quizId)->get();
                    $totalMarks += $quizQuestionData->sum('marks');
                    foreach($quizQuestionData as $rows){
                        $fillBlankQuestion = json_decode($rows->blank_answer);
                        $countQuestion += count($fillBlankQuestion);
                    }
                    //quiz submission
                    if($auth_user){
                        $logDB = QuizSubmissionLog::where('quiz_id', $quizId)->where('user_id', $auth_user->id)->first();
                    }
                    if(!empty($logDB)){
                        $logid = $logDB->id;
                        $submittedQuiz = QuizSubmission::where('quiz_submission_log_id', $logid)->get();
                        $submissionObtainMarks += $submittedQuiz->sum('obtained_marks');
                    }
                }
            }
           $data[] =array(
                'contentType' => $content_type,
                'contentLayout' => $content_layout,
                'contentData' =>$contentData,
                'quizId'=>$quizId,
                'quizQuestionType'=>$quiz_question_type,
                'quizTitle'=>$quizTitle,
                'quizType'=>$quizType,
                'quizContentId'=>$quizContentId,
                'quizDescription'=>$quizDescription,
                'quizQuestionData'=>$quizQuestionData,
                'submittedQuiz'=>$submittedQuiz,
                'countQuestion'=>$countQuestion,
                'totalMarks'=>$totalMarks,
                'submissionObtainMarks'=>$submissionObtainMarks,
           );
        }
        
        //dd($data);
        $categories = Category::with('articles')->get();
        $comments = Comment::where('article_id', $id)->where('status', 'approved')->with('user')->paginate(2);
        $likes = LikeArticle::where('article_id', $id)->first();
        $tags = Tags::inRandomOrder()->take(17)->get();
        $all_article_faq = ArticleFaq::where('article_id', $id)->get();
        return view('theme.'.$this->theme_name.'.pages.detail_page')->with(['meta'=>$meta,'detail_post'=>$detail_post,'related_post'=>$related_post, 'data'=>$data, 'categories'=>$categories, 'article_id'=>$id, 'article_slug'=>$slug, 'comments'=>$comments, 'likes'=>$likes, 'popularPost'=>$popular_post, 'allTags'=>$tags, 'all_article_faq'=>$all_article_faq]);

    }
    private function hitCounter($id)
    {
        $clientIP = request()->ip();
        $couter_exist = HitCounter::where('article_id',$id)->where('ip_address', $clientIP)->get();
        
        if($couter_exist->count()){
            $raw_hits       =    $couter_exist[0]->raw_hits;
            HitCounter::where('article_id',$id)->where('ip_address', $clientIP)->update(['raw_hits'=> $raw_hits +1]);
        }else{
           // $unique_hits    =    $couter_exist[0]->unique_hits;
           $details = json_decode(file_get_contents("http://ipinfo.io/{$clientIP}/json"));
            HitCounter::create([
                                    'article_id'=>$id,
                                    'ip_address'=> $clientIP,
                                    // 'post_type'=>'video',
                                    'unique_hits'=>1,
                                    'raw_hits'=>1,
                                    // 'city'=>$details->country,
                                ]);
        }
    }
    public function quizSubmission(Request $request)
    {
        $data               = $request->all();
        //dd($data);
        $quiz_id            = $data['quiz_id'];
        $quiz_content_id    = $data['quiz_content_id'];
        $question_type      = $data['question_type'];
        $quiz_type          = $data['quiz_type'];
        $answerData = [];
        $answer = [];
        $test ='';
        if($question_type == 'multiple_choice'){
            $multiple_choice_question_id    = $data['multiple_choice_question_id'];
            $multipleChoiceAns              = $data['multipleChoiceAns'];
            foreach($multipleChoiceAns as $key=>$answer){
                //$submitted_ans_index    = $answer[0]; // Its a seril of Radio button
                $question_id = $multiple_choice_question_id[$key];
                $multipleChoiceDB       = QuizMultipleChoice::find($question_id);
                $is_correct_arr         = json_decode($multipleChoiceDB->is_correct);
                $question_mark          = $multipleChoiceDB->marks;

                if(in_array($answer, $is_correct_arr)){
                    $is_correct = "yes";
                    $obtainMarks = $question_mark;
                 }else{
                    $is_correct = "no";
                    $obtainMarks = 0;
                 }
                 $array = [
                    'quiz_content_id'   =>$quiz_content_id,
                    'quiz_id'           =>$quiz_id,
                    'question_id'       =>$question_id, 
                    'question_type'     =>$question_type, 
                    'quiz_type'         =>$quiz_type, 
                    'answered_text'     =>NULL, 
                    'submitted_ans'     =>$answer, 
                    'is_correct'        =>$is_correct, 
                    'obtained_marks'    =>$obtainMarks,
                ];
                $this->examCreate($array);
            }
        }elseif($question_type == 'radio'){
            $radio_question_id    = $data['radio_question_id'];
            $radioAns              = $data['radioAns'];
            foreach($radioAns as $key=>$answer){
                //$submitted_ans_index    = $answer[0]; // Its a seril of Radio button
                $question_id        = $radio_question_id[$key];
                $radioDB            = QuizRadio::find($question_id);
                $is_correct_arr     = json_decode($radioDB->is_correct);
                $question_mark      = $radioDB->marks;

                if(in_array($answer, $is_correct_arr)){
                    $is_correct = "yes";
                    $obtainMarks = $question_mark;
                 }else{
                    $is_correct = "no";
                    $obtainMarks = 0;
                 }
                 $array = [
                    'quiz_content_id'   =>$quiz_content_id,
                    'quiz_id'           =>$quiz_id,
                    'question_id'       =>$question_id, 
                    'question_type'     =>$question_type, 
                    'quiz_type'         =>$quiz_type, 
                    'answered_text'     =>NULL, 
                    'submitted_ans'     =>$answer, 
                    'is_correct'        =>$is_correct, 
                    'obtained_marks'    =>$obtainMarks,
                ];
                $this->examCreate($array);
            }
        }elseif($question_type == 'drop_down'){
            $dropDown_question_id    = $data['dropDown_question_id'];
            $dropDownAns              = $data['dropDown_ans'];
            foreach($dropDownAns as $key=>$answer){
                $question_id        = $dropDown_question_id[$key];
                $dropDownDB            = QuizDropDown::find($question_id);
                $is_correct_arr     = json_decode($dropDownDB->is_correct);
                $question_mark      = $dropDownDB->marks;
                if($is_correct_arr[0] == $answer){
                    $is_correct = 'yes';
                    $obtainMarks = $question_mark;
                }else{
                    $is_correct = 'no';
                    $obtainMarks = 0;
                }

                $array = [
                    'quiz_content_id'   =>$quiz_content_id,
                    'quiz_id'           =>$quiz_id,
                    'question_id'       =>$question_id, 
                    'question_type'     =>$question_type, 
                    'quiz_type'         =>$quiz_type, 
                    'answered_text'     =>NULL, 
                    'submitted_ans'     =>$answer, 
                    'is_correct'        =>$is_correct, 
                    'obtained_marks'    =>$obtainMarks,
                ];
                $this->examCreate($array);
            }
        }elseif($question_type == 'true_false_not_given'){
            $trueFalse_question_id    = $data['trueFalse_question_id'];
            $trueFalseAns              = $data['trueFalse_ans'];
            foreach($trueFalseAns as $key=>$answer){
                $question_id        = $trueFalse_question_id[$key];
                $trueFalseDB            = QuizTrueFalse::find($question_id);
                $is_correct_arr     = json_decode($trueFalseDB->is_correct);
                $question_mark      = $trueFalseDB->marks;
                if($is_correct_arr[0] == $answer){
                    $is_correct = 'yes';
                    $obtainMarks = $question_mark;
                }else{
                    $is_correct = 'no';
                    $obtainMarks = 0;
                }

                $array = [
                    'quiz_content_id'   =>$quiz_content_id,
                    'quiz_id'           =>$quiz_id,
                    'question_id'       =>$question_id, 
                    'question_type'     =>$question_type, 
                    'quiz_type'         =>$quiz_type, 
                    'answered_text'     =>NULL, 
                    'submitted_ans'     =>$answer, 
                    'is_correct'        =>$is_correct, 
                    'obtained_marks'    =>$obtainMarks,
                ];
                $this->examCreate($array);
            }
        }elseif($question_type == 'fill_blank'){
            $fillBlank_ans    = $data['fillBlank_ans'];
            $fillBlankQuestionId = $data['fillBlank_question_id'];
            
            foreach($fillBlankQuestionId as $question_id){
                $fillBlankDB = QuizFillBlank::find($question_id);
                $correct_ans_array = json_decode($fillBlankDB->blank_answer);
                $question_marks = $fillBlankDB->marks;
                $fillblankJson = [];
                $hello = 0;
                foreach($fillBlank_ans as $rows){
                    if($question_id == $rows['name']){
                        $fillblankJson []= $rows['value'];
                        $fill_correct = 0;
                        foreach($correct_ans_array as $key=>$correct_ans){
                            $submitted_ans = strtolower($rows['value']);
                            if(strpos($correct_ans, '/')){
                                $explode_correct_ans = explode('/', $correct_ans);
                                if($submitted_ans == null){
                                    echo "Fill the all field";
                                }else{
                                    $arr_lowercase = array_map('strtolower', $explode_correct_ans);
                                    if(in_array($submitted_ans, $arr_lowercase)){
                                         $fill_correct +=1;
                                    }
                                }
                            }else{
                                if($submitted_ans == null){
                                    echo "Fill the all field";
                                }else{
                                    
                                    $strcomp              = strcmp(strtolower(trim($correct_ans, " ")),strtolower(trim($submitted_ans, " ")));
                                    if($strcomp == 0){
                                        $fill_correct +=1;
                                    }
        
                                }
                            }
                        }
                    }
                }
                $array = [
                    'quiz_content_id'   =>$quiz_content_id,
                    'quiz_id'           =>$quiz_id,
                    'question_id'       =>$question_id, 
                    'question_type'     =>$question_type, 
                    'quiz_type'         =>$quiz_type, 
                    'answered_text'     =>json_encode($fillblankJson), 
                    'submitted_ans'     =>NULL, 
                    'is_correct'        =>$fill_correct, 
                    'obtained_marks'    =>$fill_correct,
                ];
                $this->examCreate($array);
            }
        }
        
        //return redirect()->back()->with('success', 'Quiz submitted successfully');
        return response()->json([
            'message' => 'Successfuly',
          ],200);
    }
    public function examCreate($array)
    {
        // $auth_user = Auth::guard('customLogin')->user();
        // $submittedQuiz = QuizSubmissionLog::where('quiz_id', $array['quiz_id'])->where('user_id', $auth_user->id)->first();
        // if($submittedQuiz != null){
        //     $submitted_quiz_id = $submittedQuiz->id;
        //     $submission = QuizSubmission::where('quiz_submission_log_id', $submitted_quiz_id)->get();
        //     foreach($submission as $rows){
        //         $rows->delete();
        //     }
        // }
       

        $examLog = QuizSubmissionLog::firstOrCreate([
            'user_id'=> Auth::guard('customLogin')->user()->id,
            'quiz_id'=>$array['quiz_id'],
        ]);
        QuizSubmission::create([
            'quiz_submission_log_id'=> $examLog->id,
            'quiz_content_id'       => $array['quiz_content_id'], //article content id
            'question_id'           => $array['question_id'],
            'question_type'         => $array['question_type'],
            'quiz_type'             => $array['quiz_type'],
            'submitted_ans'         => json_encode($array['submitted_ans']), // ans_id
            'answered_text'         => $array['answered_text'], // fill ans
            'is_correct'            => $array['is_correct'], // fill ans
            'obtained_marks'        => $array['obtained_marks'], // fill ans
        ]);
    }

}
