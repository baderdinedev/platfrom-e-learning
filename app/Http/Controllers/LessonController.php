<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Level;
class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();

        return view('teacher.lessons.index', compact('lessons'));
    }

            // Affiche le formulaire pour créer un nouveau niveau
            public function create()
            {
                $levels = Level::all();
                return view('teacher.lessons.create', compact('levels'));
            }
        

            public function store(Request $request)
            {
                $validatedData = $request->validate([
                    'title' => 'required',
                    'description' => 'required',
                    'mediaUrl' => 'required|mimes:mp4,webm|max:204800',
                    'level_id' => 'required|exists:levels,id'
                ]);
            
                $lesson = new Lesson;
            
                $lesson->title = $request->title;
                $lesson->description = $request->description;
            
                if ($request->hasFile('mediaUrl')) {
                    $mediaUrl = $request->file('mediaUrl');
                    $filename = time() . '.' . $mediaUrl->getClientOriginalExtension();
                    $path = $mediaUrl->storeAs('public/videos', $filename);
                    $lesson->mediaUrl = $filename;
                }
            
                $lesson->level_id = $request->level_id;
            
                $lesson->save();
                
            
                return redirect('teacher/lessons')->with('success', 'Lesson has been added');
            }
            
            

    public function show($id)
    {
        $lesson = Lesson::find($id);

        return view('teacher.lessons.show', compact('lesson'));
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);

        return view('teacher.lessons.edit', compact('lesson'));
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson->title = $request->get('title');
        $lesson->description = $request->get('description');
        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('user/videos/');
            $lesson->mediaUrl = $path;
          }
        $lesson->save();

        return redirect('teacher/lessons')->with('success', 'Lesson has been updated');
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect('/lessons')->with('success', 'Lesson has been deleted');
    }
}
