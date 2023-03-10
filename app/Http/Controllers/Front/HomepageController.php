<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Resources\ArticleResource;
use App\Interfaces\ArticleRepositoryInterface;

use App\Models\Category;


class HomepageController extends Controller
{

    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->theme_name = env('SITE_THEME');
    }

    public function homepage(){
        $meta['title'] = 'Home Page';
        $meta['description'] = 'Home Page Description';
        $meta['tags'] = ['tag1','tag2','tag3'];
        $meta['created_at'] = date('d-m-Y');
        $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];
        $featured_post = $this->articleRepository->getFeaturedPost();
        $premium_post = $this->articleRepository->premiumPost();
        $popular_post = $this->articleRepository->popularPost();
        $latest_post = $this->articleRepository->getLatestPost();
        $paginate_post = $this->articleRepository->getPaginate(3);
        return view('theme.'.$this->theme_name.'.pages.home')->with(['meta'=>$meta,'featured_post'=>$featured_post,'premium_post'=>$premium_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post] );
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


    //  dd(  $featured_post);
        return view('theme.'.$this->theme_name.'.pages.category')->with(['meta'=>$meta,'category'=>$category,'featured_post'=>$featured_post,'premium_post'=>$premium_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post] );
    }


    public function search(Request $request){

        $keyword = $request->query('keyword');
        dd(  $keyword);

        $category = Category::findOrFail($id);

        $cat_id = $category->id;
        $cat_name = $category->cat_name;
        $meta_description = $category->meta_description;
        $meta_keyword = $category->meta_keyword;

        $meta['title'] = 'Category Page | ' .  $cat_name;
        $meta['description'] =  $meta_description ;
        $meta['tags'] =   explode(" ",$meta_keyword) ;
        $meta['created_at'] = date('d-m-Y');
        $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];

        $featured_post = $this->articleRepository->getFeaturedPost($cat_id);
        $premium_post = $this->articleRepository->premiumPost();
        $popular_post = $this->articleRepository->popularPost();
        $latest_post = $this->articleRepository->getLatestPost();
        $paginate_post = $this->articleRepository->getPaginate(3);


    //  dd(  $featured_post);
        return view('theme.'.$this->theme_name.'.pages.search_page')->with(['meta'=>$meta,'category'=>$category,'featured_post'=>$featured_post,'premium_post'=>$premium_post,'popular_post'=>$popular_post,'latest_post'=>$latest_post,'paginate_post'=>$paginate_post] );
    }



    public function detail(Request $request, $id, $slug){

        $detail_post  =    $this->articleRepository->detailsPost($id);
        $related_post  =    $this->articleRepository->relatedPost($id);

      //  dd( $related_post);

        $meta['title'] = $detail_post[0]->title;
        $meta['description'] =  $detail_post[0]->meta_description;
        $meta['tags'] =   explode(" ",$detail_post[0]->tags) ;
        $meta['created_at'] = $detail_post[0]->created_at->format("Y-m-d");
        $meta['images'] = ['https://via.placeholder.com/200x100','https://via.placeholder.com/200x100'];

        return view('theme.'.$this->theme_name.'.pages.detail_page')->with(['meta'=>$meta,'detail_post'=>$detail_post,'related_post'=>$related_post] );

    }





}
