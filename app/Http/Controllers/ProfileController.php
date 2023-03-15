<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User; // Import the User model here
use App\Models\Lesson; //
use App\Models\Level;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


     public function introduction($id){
        $lesson = Lesson::find($id);
        return view('layouts.introduction',compact('lesson'));
     }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    
    public function viewBlog(){
        return view('blog.index');
    }

    public function viewChat(){
        return view('chat.index');
    }


    public function getLesson(){
        $lesson = Lesson::all()->count();
        $lessonc = Lesson::orderBy('level_id')->paginate(5);
        $users = User::select('users.*', 'levels.name as level_name')
        ->join('levels', 'users.level_id', '=', 'levels.id')
        ->get();
        return view('layouts.app',compact('lesson','lessonc','users'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
