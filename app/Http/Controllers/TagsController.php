<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use Illuminate\Support\Facades\Validator;
class TagsController extends Controller
{
    public function index()
    {
        $allData = Tags::orderBy('id', 'DESC')->paginate(10);
        return view('admin.tags.manage-tags', compact('allData'));
    }
    public function create()
    {
        return view('admin.tags.create-tags');
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|string'
        ]
        );
        if( $validation->fails())
        {
            return response()->json(['error'=>$validation->errors()->all()]);
        }

        $tags_name = $request->name;


        Tags::create([
            'name'=>$tags_name,
        ]);
        return redirect()->route('tags')->with('success', 'Tags Created successfully');
    }
    public function destroy($id)
    {
        $tags = Tags::find($id);
       
        $tags->delete();
        return redirect()->route('tags')->with('success', 'Tags Deleted successfully');
    }
}
