<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function index($id)
    {   
        $courses = Course::find($id);
        return view('layouts.lessons.content',compact('courses'));
    } 
}
