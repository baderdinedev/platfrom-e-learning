<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\InscriptionClassroom;



class ClassController extends Controller
{
    public function index()
    {
        try {
            if (Auth::guard('teacher')->check()) {
                $classes = Classroom::where('created_by', Auth::guard('teacher')->id())->get();
                $registeredUsers = InscriptionClassroom::select('classroom_id', DB::raw('count(*) as total'))
                ->groupBy('classroom_id')
                ->pluck('total', 'classroom_id');
                return view('teacher.classroom.index', compact('classes','registeredUsers'));
            } else {
                return redirect('teacher/login')->with('error', 'Please log in as a teacher to access this page.');
            }
        } catch (\Exception $e) {
            return redirect('teacher/dashboard')->with('error', 'Oops! Something went wrong.');
        }
    }
    
    
    

    public function create()
    {
        try {
            $formations = Formation::where('is_hidden', false)->get();
            $users = User::all();
            if (Auth::guard('teacher')->check()) {
                $formations = Formation::all();
                $users = User::all();
                return view('teacher.classroom.create', compact('formations', 'users'));
            } else {
                return redirect('teacher/login')->with('error', 'Please log in as a teacher to access this page.');
            }
        } catch (\Exception $e) {
            return redirect('/dashboard')->with('error', 'Oops! Something went wrong.');
        }
    }
    

    public function store(Request $request)
    {
        $user = Auth::guard('teacher')->user();
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'name' => 'required',
            'limit_place' => 'required|integer|min:1|max:30',
        ]);
    
        $classroom = new Classroom([
            'name' => $request->input('name'),
            'formation_id' => $request->input('formation_id'),
            'limit_place' => $request->input('limit_place'),
            'created_by' => $user->id,
            'access_code' => Str::random(10),
        ]);
    
        $classroom->save();
    
        return redirect()->route('managment-class');
    }
    
}
