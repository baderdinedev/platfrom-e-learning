<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;

class TeacherController extends Controller
{
    public function TeacherIndex(){
        return view('teacher.teacher_login');
    }

    public function TeacherLogin(Request $request){
        $check = $request->all();
        if(Auth::guard('teacher')->attempt(['email' => $check['email'],'password' => $check['password'] ])){
           return redirect()->route('teacher.dashboard')->with('error','teacher login successfully');
        }else{
           return back()->with('error','Invalid Email Or password');
        }
   }

   public function TeacherRegister(){
        return view('teacher.teacher_register');
   }

   public function TeacherRegisterCreate(Request $request){
    
      Teacher::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'created_at' => Carbon::now(),
      ]);

      return redirect()->route('teacher_login_form')->with('error','Teacher Created  With Successfully');

   }

    public function TeacherDashboard(){
        $userc = User::all()->count();
        $users = User::orderBy('id')->paginate(2);

        return view('teacher.index',compact('userc','users'));
    }

    public function manageStud(){
        $users = User::orderBy('id')->paginate(50);
        return view('teacher.manage_studentt',compact('users'));
    }

    public function deleteUsers($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Student deleted successfully');
    }

    public function TeacherLogout(){
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher_login_form')->with('error','Logout');
    }

}
