<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Like;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

use Illuminate\View\View;
class UserController extends Controller
{

    public function test($id){  
        $courses = Course::find($id);
        return view('layouts.lessons.test',compact('courses'));
    }

    public function getLesson(){
        $user = Auth::user()->id;
        $userss = Auth::user()->level_id;
        $users = Auth::user()->with('level')
        ->select('users.id', 'levels.name as level_name')
        ->join('levels', 'users.level_id', '=', 'levels.id')->where('users.id',$user)
        ->get(); 

        $lessonc = DB::table('lessons')
       ->get();

        return view('layouts.app',compact('lessonc','users'));
    }

    public function introduction($id){
        $lesson = Lesson::find($id);
        $user = Auth::user()->id;
        $userss = Auth::user()->level_id;
        $users = Auth::user()->with('level')
        ->select('users.id', 'levels.name as level_name')
        ->join('levels', 'users.level_id', '=', 'levels.id')->where('users.id',$user)
        ->get(); 

        $lessonc = DB::table('lessons')
       ->get();
        return view('layouts.introduction',compact('lesson','lessonc','users'));
     }


     public function completeUserInfo()
{

    return view('users.completeUserInfo');
}

public function showUserInfo()
{
    $user = Auth::user();
    return view('users.show',compact('user'));
}

public function edit()
{
    $user = Auth::user();

    return view('users.edit', compact('user'));
}


public function update(Request $request)
{
    $user = Auth::user();

    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'prenam' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        'birthday_date' => ['required', 'date'],
        'phone' => ['required', 'string'],
    ]);

    $user->update($validatedData);

    return redirect()->route('users.show-info')->with('success', 'Profile updated successfully');
}

public function showChangePasswordForm()
{
    return view('users.change-password');
}


public function changePassword(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'current_password' => 'required',
        'password' => [
            'required',
            'confirmed',
            'min:8',
            Rule::unique('users')->ignore($user),
        ],
    ]);

    // Verify the current password is correct
    if (!Hash::check($request->input('current_password'), $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
    }

    // Update the user's password
    $user->update([
        'password' => Hash::make($request->input('password')),
    ]);

    return redirect()->back()->with('success', 'Your password has been changed.');
}

   // All Methods user needed in news route : 


   public function likeOrDislike(Request $request, $id)
   {
       $news = News::find($id);
       $user_id = Auth::id();
   
       $like = Like::where('user_id', $user_id)->where('news_id', $news->id)->first();
   
       if ($like) {
           // User has already liked/disliked this news, update the existing like/dislike
           if ($request->like) {
               $like->like_count = 1;
               $like->dislike_count = 0;
           } else {
               $like->like_count = 0;
               $like->dislike_count = 1;
           }
           $like->save();
       } else {
           // User has not liked/disliked this news before, create a new like
           $new_like = new Like;
           $new_like->user_id = $user_id;
           $new_like->news_id = $news->id;
           if ($request->like) {
               $new_like->like_count = 1;
               $new_like->dislike_count = 0;
           } else {
               $new_like->like_count = 0;
               $new_like->dislike_count = 1;
           }
           $new_like->save();
       }
   
       return redirect()->back();
   }


   public function comment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->news_id = $id;
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }



   

}
