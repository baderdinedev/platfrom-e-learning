<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;


use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Certificat;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\inscriptionClassroom;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }

    public function forgetPassword() {
        
        // Generate a unique token and store it in the database
        $token = Str::random(60);
        $this->reset_password_token = $token;
        $this->reset_password_created_at = Carbon::now();
        $this->save();
        
        // Send an email to the admin with a link to reset their password
        $data = [
            'token' => $token,
            'email' => $this->email
        ];
        Mail::send('emails.admin-reset-password', $data, function($message) {
            $message->to($this->email)
                ->subject('Reset Your Password');
        });
        
        return "Password reset email sent to {$this->email}";
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
        $users = User::with('level')->orderBy('id')->paginate(20);
        // Test if user hase an inscription in classroom 
        $usersInClassroom = User::whereHas('inscriptionClassroom')->pluck('id')->toArray();
        return view('admin.manage_student',compact('userc','users', 'usersInClassroom'));
    }

    public function SearchStudent(Request $request)
    {
        $search = $request->query('search');
        $students = User::where('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%")
                            ->orWhere('id', 'like', "%$search%")
                            ->orWhere('phone', 'like', "%$search%")
                            ->paginate(10);
        return view('teacher.search-student', compact('students'));
    }

    
    public function activate($id)
    {
        $student = User::find($id);
    
        if (!$student) {
            return redirect()->route('manage_student')->with('error', 'Student not found.');
        }
    
        $student->is_active = true;
        $student->save();
    
        return redirect()->route('manage_student')->with('success', 'Student account has been activated.');
    }
        

    public function deactivate($id)
    {
        $student = User::find($id);
    
        if (!$student) {
            return redirect()->route('manage_student')->with('error', 'Student not found.');
        }
    
        $student->is_active = false;
        $student->save();
    
        return redirect()->route('manage_student')->with('success', 'Student account has been deactivated.');
    }

    public function manageCerticate($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            abort(404); // User not found, handle appropriately
        }
    
        return view('admin.sertificat', compact('user'));
    }
    public function attribute($id)
    {
        $certificat = new Certificat();
        $certificat->user_id = $id;
        $certificat->save();

        return redirect()->back()->with('success', 'Certificate attributed successfully.');
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
