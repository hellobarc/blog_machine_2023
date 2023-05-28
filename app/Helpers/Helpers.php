<?php

namespace App\Helpers;
use App\Models\{
                    Article,
                    Author,
                    Category,
                    TextContent,
                    ImageContent,
                    LeftTextVideo,
                    RightTextVideo,
                    VideoContent,
                    AudioContent,
                    LikeArticle,
                    Comment,
                    HitCounter,
                    Tags,
                    ArticleFaq,
                };
use App\Models\Quiz\{
                        QuizMultipleChoice,
                        QuizDropDown,
                        QuizRadio,
                        QuizTrueFalse,
                        QuizFillBlank,
                    };
use Carbon\Carbon;

class Helpers {
    public static function find_co_author($id)
    {
        $find_id = Author::find($id);
        $author_name = $find_id->author_name;
        return $author_name;
    }
    public static function find_parent_category($id)
    {
        $find_cat = Category::find($id);
        $cat_name = $find_cat->cat_name;
        return $cat_name;
    }
    public static function integerDateToString($date)
    {
        $stringDate = Carbon::parse($date)->isoFormat('MMM Do YYYY');
        return $stringDate;
    }
    public static function find_content($id, $content_type)    
    {
        if($content_type == 'text' || $content_type == 'quote' || $content_type == 'subheadline' || $content_type == 'list-content'){
            $find_text_id = TextContent::where('article_content_id', $id)->first();
            return $find_text_id;
        }
        if($content_type == 'image'){
            $find_image_id = ImageContent::where('article_content_id', $id)->first();
            return $find_image_id;
        }
        if($content_type == 'left-text-video'){
            $find_left_text_video_id = LeftTextVideo::where('article_content_id', $id)->first();
            return $find_left_text_video_id;
        }
        if($content_type == 'right-text-video'){
            $find_right_text_video_id = RightTextVideo::where('article_content_id', $id)->first();
            return $find_right_text_video_id;
        }
        if($content_type == 'video-content'){
            $find_video_content_id = VideoContent::where('article_content_id', $id)->first();
            return $find_video_content_id;
        }
        if($content_type == 'audio-content'){
            $find_audio_content_id = AudioContent::where('article_content_id', $id)->first();
            return $find_audio_content_id;
        }
    }
    public static function count_likes($article_id)
    {
        $likes = LikeArticle::where('article_id', $article_id)->sum('likes');
        return $likes;
    }
    public static function total_likes()
    {
        $likes = LikeArticle::sum('likes');
        return $likes;
    }
    public static function count_comments($article_id)
    {
        $comments = Comment::where('article_id', $article_id)->where('status', 'approved')->count();
        return $comments;
    }
    public static function count_views($article_id)
    {
        $views = HitCounter::where('article_id', $article_id)->sum('raw_hits');
        return $views;
    }
    public static function total_views()
    {
        $views = HitCounter::sum('raw_hits');
        return $views;
    }
    public static function tag_name($tag_id)
    {
        $tag = Tags::find($tag_id);
        $tag_name = $tag->name;
        return $tag_name;
    }
    public static function find_quiz_question($quiz_id, $question_type)
    {
        if($question_type == 'multiple_choice'){
            $questions = QuizMultipleChoice::where('quiz_id', $quiz_id)->first();
        }elseif($question_type == 'drop_down'){
            $questions = QuizDropDown::where('quiz_id', $quiz_id)->first();
        }elseif($question_type == 'radio'){
            $questions = QuizRadio::where('quiz_id', $quiz_id)->first();
        }elseif($question_type == 'true_false_not_given'){
            $questions = QuizTrueFalse::where('quiz_id', $quiz_id)->first();
        }elseif($question_type == 'fill_blank'){
            $questions = QuizFillBlank::where('quiz_id', $quiz_id)->first();
        }
        return $questions;
    }
    public static function cat_wise_article($cat_id)
    {
        $articles = Article::where('category_id', $cat_id)->count();
        return $articles;
    }
    public static function get_cat_wise_article($cat_id)
    {
        $articles = Article::where('category_id', $cat_id)->get();
        foreach($articles as $item){
            $article_name = $item->title;
            return $article_name;
        }
    }
    public static function get_cat_wise_article_id($cat_id)
    {
        $articles = Article::where('category_id', $cat_id)->get();
        // foreach($articles as $item){
        //     $article_id = $item->id;
        // }
        return $articles;
    }
    public static function get_article_faq($article_id)
    {
        $allArticleFaq = ArticleFaq::where('article_id', $article_id)->get();
        return $allArticleFaq;
    }
    
}