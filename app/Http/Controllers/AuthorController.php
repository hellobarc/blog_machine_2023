<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Image;
use File;
use Illuminate\Support\Facades\Validator;
class AuthorController extends Controller
{
    public function index()
    {
        $allData = Author::orderBy('id', 'DESC')->paginate(10);
        return view('admin.create-author.manage-author', compact('allData'));
    }
    public function create()
    {
        return view('admin.create-author.create-author');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'author_name' => 'required|string',
            'author_image' => 'nullable|dimensions:width=120,height=120',
            'author_speech' => 'nullable|string'
        ]
        );
        if( $validation->fails())
        {
            return redirect()->back()->with('error', 'image upload validation');
        }
        $authorDB = new Author();

        $authorDB->author_name = $request->author_name;
        $authorDB->author_speech = $request->author_speech;
        $authorDB->save();
        
        $image = $request->file('author_image');
        if($image != NULL){
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('uploads/author/' .$img);
            $imgFile = Image::make($image)->save($location);
            $authorDB->author_image = $img;
        }
       
        return redirect()->route('author')->with('success', 'Author Created successfully');
    }
    public function edit($id)
    {
        $author = Author::find($id);
        return view('admin.create-author.edit-author', compact('author'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $author = Author::find($id);
        $image = $request->file('author_image');
        if($image){
            if (File::exists('uploads/author/'.$author->image)) {
                File::delete('uploads/author/'.$author->image);
            }
            $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('uploads/author/' .$img);
            $imgFile = Image::make($image)->save($location);
        }else{
            $img = $author->image;
        }
        
        Author::updateOrCreate(
            [
                'id'=>$id,
            ],
            [
                'author_name'=> $data['author_name'],
                'image'=> $img,
                'author_speech'=> $data['author_speech'],
            ]
        );
        return redirect()->route('author')->with('success', 'Author information updated successfully');
    }
    public function destroy($id)
    {
        $author = Author::find($id);
        if (File::exists('uploads/author/'.$author->image)) {
            File::delete('uploads/author/'.$author->image);
        }
        $author->delete();
        return redirect()->route('author')->with('success', 'Author Deleted successfully');
    }
}
