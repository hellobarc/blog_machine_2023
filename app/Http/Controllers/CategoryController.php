<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaveCategoryRequest;

use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\Category;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $getData = $this->categoryRepository->getAll();
        $allData = CategoryResource::collection($getData);
        return view('admin.category.manage-category', compact('allData'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create-category', compact('categories'));
    }

    public function store(SaveCategoryRequest $request)
    {
        $orderDetails = $request->only([
            'cat_name',
            'parent_id',
            'meta_keyword',
            'meta_description',
            'page_title',
        ]);

        $image = $request->file('featured_image');
        if($image != NULL){
            $img = time().'.'.$image->getClientOriginalExtension();
            $featured_path = 'uploads/category/featured/' .$img;
            $location = public_path($featured_path);
            $thumbnail_path = 'uploads/category/thumbnail/' .$img;
            $thumbnail = public_path($thumbnail_path );
            $imgFile = Image::make($image)->save($location);


            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnail);

            
            $orderDetails['thumbnail'] = $img;
            $orderDetails['featured_image'] =  $img;
        }
        

        $orderDetails['slug'] = Str::slug($request->input('cat_name') ,"-");

        $getData = $this->categoryRepository->create($orderDetails);

        return redirect()->route('admin.category')->with('success', 'Category Created Successfully.');
    }

    public function show(Request $request)
    {
        $catId = $request->route('id');

        $data = $this->categoryRepository->getById($catId);
        $categories = Category::all();
        return view('admin.category.edit-category', compact('data', 'categories'));
    }

    public function update(Request $request)
    {
        $catId = $request->route('id');
        $categoryDetails = $request->only([
            'cat_name',
            'parent_id',
            'meta_keyword',
            'meta_description',
            'page_title',
        ]);
        $categoryDetails['slug'] = Str::slug($request->input('cat_name') ,"-");
        
        $find_id = Category::where('id', $catId)->first();
        if (File::exists('uploads/category/featured/'.$find_id->featured_image) && File::exists('uploads/category/thumbnail/'.$find_id->thumbnail)) {
            File::delete('uploads/category/featured/'.$find_id->featured_image);
            File::delete('uploads/category/thumbnail/'.$find_id->thumbnail);
        }
        $image = $request->file('featured_image');
        if($image){
            $img = time().'.'.$image->getClientOriginalExtension();
            $featured_path = 'uploads/category/featured/' .$img;
            $location = public_path($featured_path);
            $thumbnail_path = 'uploads/category/thumbnail/' .$img;
            $thumbnail = public_path($thumbnail_path );
            $imgFile = Image::make($image)->save($location);


            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnail);
            
            
            $categoryDetails['featured_image'] =  $img;
            $categoryDetails['thumbnail'] = $img;
        }

        $updateData = $this->categoryRepository->update($catId, $categoryDetails);

        return redirect()->route('admin.category')->with('success', 'Category Update Successfully.');
    }

    public function destroy(Request $request)
    {
        $catId = $request->route('id');
        $find_id = Category::where('id', $catId)->first();
        
        if(!is_null($find_id))
    	{
    		if (File::exists('uploads/category/featured/'.$find_id->featured_image) && File::exists('uploads/category/thumbnail/'.$find_id->thumbnail)) {
                File::delete('uploads/category/featured/'.$find_id->featured_image);
                File::delete('uploads/category/thumbnail/'.$find_id->thumbnail);
            }
        }
        $deleteData = $this->categoryRepository->delete($catId);

        return redirect()->route('admin.category')->with('success', 'Category Deleted Successfully.');
    }
}
