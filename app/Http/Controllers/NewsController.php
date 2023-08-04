<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Models\News;
use App\Models\Comment;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('teacher.news_settings.index', compact('news'));
    }

    public function userIndex()
    {
        $news = News::where('published', true)->get();
        return view('news.index', ['news' => $news]);
    }

    public function newsShow($id)
    {
        $news = News::findOrFail($id);
        $comments = Comment::where('news_id', $id)->get();

        return view('news.show', compact('news', 'comments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.news_settings.form_add_news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published' => 'sometimes|boolean'
        ]);
    
        $user = Auth::guard('teacher')->user();
        
        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->teacher_id = $user->id; // Set the teacher's id as the news author
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $filename);
            $news->image = $filename;
        }
        
        $news->published = $request->filled('published');
        $news->save();
    
        return redirect()->route('news.index')->with('success', 'News added successfully.');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
    
        if(!$news) {
            abort(404);
        }
    
        return view('teacher.news_settings.show', compact('news'));
    }
    
    public function edit($id)
    {
        $news = News::find($id);
    
        if(!$news) {
            abort(404);
        }
    
        return view('teacher.news_settings.edit', compact('news'));
    }
    
    public function update(Request $request, $id)
    {
        $news = News::find($id);
    
        if(!$news) {
            abort(404);
        }
    
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published' => 'nullable|boolean'
        ]);
    
        $news->title = $request->input('title');
        $news->content = $request->input('content');
    
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $news->image = $imageName;
        }
    
        $news->published = $request->input('published') ? true : false;
    
        $news->save();
    
        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }
    
    public function destroy($id)
    {
        $news = News::with('comments')->find($id);
    
        if (!$news) {
            abort(404);
        }
    
        $news->comments()->delete(); // Delete the associated comments
        $news->delete(); // Delete the news item
    
        return redirect()->route('news.index')->with('success', 'News and associated comments deleted successfully');
    }
    
    
}
