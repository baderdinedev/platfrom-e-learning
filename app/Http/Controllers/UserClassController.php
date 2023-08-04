<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Formation;
use App\Models\InscriptionClassroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class UserClassController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        $registeredUsers = InscriptionClassroom::select('classroom_id', DB::raw('count(*) as total'))
                             ->groupBy('classroom_id')
                             ->pluck('total', 'classroom_id');
        return view('class.index', compact('classrooms', 'registeredUsers'));
    }

    public function showJoinForm($id)
    {
        $classroom = Classroom::findOrFail($id);
    
        // Check if the user is already registered for the classroom
        $isRegistered = InscriptionClassroom::where([
            ['user_id', auth()->id()],
            ['classroom_id', $classroom->id],
        ])->exists();
    
        $formationId = $classroom->formation->id;
    
        if ($isRegistered) {
            return redirect()->route('classroom.learn', [$classroom->id, $formationId]);
        } else {
            return view('class.join', compact('classroom'));
        }
    }
    


    public function join(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);
    
        // Check if the user has already registered to the classroom
        $user = Auth::user();
        $userClassroom = InscriptionClassroom::where('user_id', $user->id)
                                              ->where('classroom_id', $classroom->id)
                                              ->first();
        if ($userClassroom) {
            return redirect()->route('classroom.learn', $classroom->id);
        }
    
        // Check if the student code is correct
        if (!$request->has('student_code') || $request->input('student_code') != $classroom->access_code) {
            return redirect()->route('classes.join', $classroom->id)
                             ->with('error', 'Incorrect access code.');
        } else {
            $userClassroom = new InscriptionClassroom([
                'user_id' => $user->id,
                'classroom_id' => $classroom->id,
            ]);
            $userClassroom->save();
            return redirect()->route('join-class')
            ->with('success', 'You have successfully joined the classroom.');        
        }
    }
    


public function learn($classroom_id, $formation_id)
{
    $classroom = Classroom::with(['formation' => function ($query) use ($formation_id) {
        $query->where('id', $formation_id);
    }, 'formation.lessons'])
        ->where('id', $classroom_id)
        ->firstOrFail();

    return view('class.learn', compact('classroom'));
}






}
