<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }
    public function Dashboard(){
        $userc = User::all()->count();
        $users = User::orderBy('id')->paginate(2);
        $teacherc = Teacher::all()->count();
        $lessonc = Lesson::all()->count();
        return view('admin.index',compact('userc','users','teacherc','lessonc'));
    }  

    public function LessonShow(){
        $lessonc = Lesson::all()->count();
        $lessons = Lesson::orderBy('id')->paginate(40);
        return view('admin.lessons_show',compact('lessonc','lessons'));
    }
    
    public function LevelShow(){
        $levelc = Level::all()->count();
        $levels = Level::orderBy('id')->paginate(40);
        return view('admin.level_show',compact('levelc','levels'));
    }

    public function Login(Request $request){
         $check = $request->all();
         if(Auth::guard('admin')->attempt(['email' => $check['email'],'password' => $check['password'] ])){
            return redirect()->route('admin.dashboard')->with('error','admin login successfully');
         }else{
            return back()->with('error','Invalid Email Or password');
         }
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('admin/login');
    }

    public function Profile()
    {
        $user = Auth::guard('admin')->user();
        $admin = Admin::find($user->id);
        $adminData = Admin::find($admin);

        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function EditProfile(Request $request){
        $user = Auth::guard('admin')->user();
        $admin = Admin::find($user->id);
        $adminData = Admin::find($admin);
      return view('admin.admin_profile_edit');
    }

    public function StoreProfile(Request $request){
        $admin = Admin::find(Auth::guard('admin')->id());
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        // Update other fields as needed
        $admin->update();

        return redirect()->route('admin.profile');
    }
    public function manageStudent()
    {
        $userc = User::all()->count();
        $userc1 = User::get();
         $uss =  UserResource::collection($userc1);
             
         foreach ($uss as $user) {
            dd($user->get()) ;
           
            // Access other attributes as needed
        }

        $users = User::orderBy('id')->paginate(20);
      
        $level = Level::where("id",$users->id);
        return view('admin.manage_student',compact('userc','users'));
    }

    public function manageCerticate()
    {        
        return view('admin.sertificat');    
    }

    public function manageTeacher(){
        $teacherc = Teacher::all()->count();
        $teachers = Teacher::orderBy('id')->paginate(20);
        return view('admin.manage_teacher',compact('teacherc','teachers'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'Student deleted successfully');
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'Student deleted successfully');
    }


}
