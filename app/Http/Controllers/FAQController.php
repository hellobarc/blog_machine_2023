<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
                    ArticleFaq,
                };
class FAQController extends Controller
{
   public function getAll($article_id)
   {
        $allArticleFAQ = ArticleFaq::where('article_id', $article_id)->with('article')->get();
        return view('admin.article-faq.manage-faq', compact('allArticleFAQ', 'article_id'));
   }
   public function create($article_id)
   {
    return view('admin.article-faq.create-faq', compact('article_id'));
   }
   public function store(Request $request)
   {
     $data = $request->all();
     ArticleFaq::create([
        'article_id'=>$data['article_id'],
        'faq_question'=>$data['question'],
        'faq_answer'=>$data['answer'],
     ]);
     return redirect()->route('admin.manage.faq', $data['article_id']);
   }
   public function show($id)
   {
    $articleFaq = ArticleFaq::where('id', $id)->first();
    
    return view('admin.article-faq.edit-faq', compact('articleFaq'));
   }
   public function update(Request $request, $id)
   {
     $data = $request->all();
     ArticleFaq::updateOrCreate(
        [
            'id'=>$id,
        ],
        [
        'faq_question'=>$data['question'],
        'faq_answer'=>$data['answer'],
        ]
    );
     return redirect()->route('admin.manage.faq', $data['article_id']);
   }
   public function destroy($id)
   {
        $articleFaq = ArticleFaq::where('id', $id)->first();
        if(!is_null($articleFaq)){
            $articleFaq->delete();
        }
        return redirect()->route('admin.manage.faq', $articleFaq->article_id);
   }
}
