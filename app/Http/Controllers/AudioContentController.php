<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveAudioContentRequest;

use App\Interfaces\AudioContentRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\{
                    TextContent,
                    VideoContent,
                    Article,
                    ArticleContent,
                    AudioContent,
                };

class AudioContentController extends Controller
{
    private AudioContentRepositoryInterface $audioContentRepository;

    public function __construct(AudioContentRepositoryInterface $audioContentRepository) 
    {
        $this->audioContentRepository = $audioContentRepository;
    }

    public function index($article_content_id, $content)
    {
        $allData = $this->audioContentRepository->getAll($article_content_id);
        // $allData = CategoryResource::collection($getData);
        return view('admin.audio-content.manage-audio-content', compact('allData'));
    }

    public function create($article_content_id, $content_type)
    {
        $articles = Article::all();
       
        $articleContents = ArticleContent::where('id', $article_content_id)->get();
        
        return view('admin.audio-content.create-audio-content', compact('articles', 'articleContents'));
    }

    public function store(SaveAudioContentRequest $request)
    {
        $audioFile = $request->file('audio');

        $fileName = time().'.'.$audioFile->extension();  
        // $location = public_path('uploads/audio-content/' ,$fileName);
        $audioFile->move(public_path('uploads/audio-content'), $fileName);
        // $audioFile->move($location);

        $audioContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'audio_title',
        ]);
        $audioContentDetails['audio'] = $fileName;
        $storeData = $this->audioContentRepository->create($audioContentDetails);
        return redirect()->route('admin.article-content')->with('success', 'Audio Content Store Successfully.');
    }

    public function show(Request $request)
    {
        $audioContentId = $request->route('id');
        $data = $this->audioContentRepository->getById($audioContentId);
        $articles = Article::all();
        $articleContents = ArticleContent::all();
        return view('admin.audio-content.edit-audio-content', compact('data', 'articles', 'articleContents'));
    }

    public function update(Request $request)
    {
        $audioContentId = $request->route('id');
        $find_id = AudioContent::where('id', $audioContentId)->first();
        if (File::exists('uploads/audio-content/'.$find_id->audio)) {
            File::delete('uploads/audio-content/'.$find_id->audio);
        }
        $audioContentDetails = $request->only([
            'article_id',
            'article_content_id',
            'audio_title',
            
        ]);
        $audioFile = $request->file('audio');

        $fileName = time().'.'.$audioFile->extension();  
        $location = public_path('uploads/audio-content/' .$fileName);
        // $request->file->move(public_path('uploads/audio-content'), $fileName);
        $audioFile->move($location);
        $audioContentDetails['audio'] = $fileName;
        $updateData = $this->audioContentRepository->update($audioContentId, $audioContentDetails);
        return redirect()->back()->with('success', 'Audio Content Updated Successfully.');
    }

    public function destroy(Request $request)
    {
        $audioContentId = $request->route('id');
        $find_id = AudioContent::where('id', $audioContentId)->first();
        if(!is_null($find_id))
    	{
            if (File::exists('uploads/audio-content/'.$find_id->audio)) {
                File::delete('uploads/audio-content/'.$find_id->audio);
            }
        }
        
        $this->audioContentRepository->delete($audioContentId);

        return redirect()->back()->with('success', 'Audio Content Deleted Successfully.');
    }
    
}
