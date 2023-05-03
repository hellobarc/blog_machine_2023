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
