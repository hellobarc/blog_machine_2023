<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
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
        $author_name = $request->author_name;
        Author::create([
            'author_name'=>$author_name,
        ]);
        return redirect()->route('author')->with('success', 'Author Created successfully');
    }
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->route('author')->with('success', 'Author Deleted successfully');
    }
}
