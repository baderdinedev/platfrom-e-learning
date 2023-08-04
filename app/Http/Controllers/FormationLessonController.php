<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Lesson;
use App\Models\FormationLesson;
class FormationLessonController extends Controller
{
    public function index()
    {
        $formationLessons = FormationLesson::with(['formation', 'lesson'])->get();
        return view('teacher.formation_lesson.index', compact('formationLessons'));
    }
    public function create()
    {
        $formations = Formation::where('is_hidden', false)->get();
        $lessons = Lesson::all();
    
        return view('teacher.formation_lesson.create', compact('formations', 'lessons'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'formation_id' => 'required',
                'lesson_id' => 'required',
            ]);
    
            $formationLesson = new FormationLesson();
            $formationLesson->formation_id = $validatedData['formation_id'];
            $formationLesson->lesson_id = $validatedData['lesson_id'];
            $formationLesson->save();
    
            return redirect('teacher/formation-lessons')->with('success', 'Formation and lesson have been linked successfully.');
        } catch (\Exception $e) {
            return redirect('teacher/formation-lessons')->with('error', 'Oops! Something went wrong.');
        }
    }

    public function destroy($id)
    {
        $formationLesson = FormationLesson::findOrFail($id);
        $formationLesson->delete();
    
        return redirect()->back()->with('success', 'Lesson has been removed from formation successfully!');
    }
    
    
}
