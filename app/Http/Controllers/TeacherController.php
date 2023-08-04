<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class TeacherController extends Controller
{
    public function TeacherIndex(){
        return view('teacher.teacher_login');
    }

    public function Profile()
    {
        $user = Auth::guard('teacher')->user();
        $teacher = Teacher::find($user->id);
        $teacherData = Teacher::find($teacher);

        return view('teacher.teacher_profile_view',compact('teacherData'));
    }

    public function EditProfile(Request $request){
        $user = Auth::guard('teacher')->user();
        $teacher = Teacher::find($user->id);
        $teacherData = Teacher::find($teacher);
      return view('teacher.teacher_profile_edit');
    }

    public function StoreProfile(Request $request){
        try {
            $teacher = Teacher::find(Auth::guard('teacher')->id());
            $teacher->name = $request->input('name');
            $teacher->email = $request->input('email');
            $teacher->password = bcrypt($request->input('password'));
            // Update other fields as needed
            $teacher->update();
        } catch (\Illuminate\Database\QueryException $ex) {
            // Handle the database error
            return redirect()->back()->with('error', 'Error: ' . $ex->getMessage());
        }
    
        return redirect()->route('teacher.profile')->with('success', 'Profile updated successfully.');
    }



    public function TeacherLogin(Request $request){
        $check = $request->all();
        if(Auth::guard('teacher')->attempt(['email' => $check['email'],'password' => $check['password'] ])){
           return redirect()->route('teacher.dashboard')->with('error','teacher login successfully');
        }else{
           return back()->with('error','Invalid Email Or password');
        }
   }

   public function showRegistrationForm(){
    return view('teacher.teacher_register');
   }
   
   public function TeacherRegister(Request $request)
   {
       // Validation des données d'entrée
       $validatedData = $request->validate([
           'name' => 'required|max:255',
           'email' => 'required|email|unique:teachers|max:255',
           'password' => 'required|min:8|max:255',
       ]);

       // Création d'un nouvel objet Teacher avec les données d'entrée
       $teacher = new Teacher();
       $teacher->name = $validatedData['name'];
       $teacher->email = $validatedData['email'];
       $teacher->password = bcrypt($validatedData['password']); // Cryptage du mot de passe
       $teacher->save();

       // Redirection vers une page de confirmation
       return redirect('/')->with('success', 'Enseignant enregistré avec succès.');
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
        $levels = Level::all()->count();
        $users = User::orderBy('id')->paginate(2);

        return view('teacher.index',compact('userc','users','levels'));
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

    public function manageStud(){
        $userc = User::orderBy('id')->paginate(50);
        $users = User::with('level')->orderBy('id')->paginate(20);
        
        return view('teacher.manage_studentt',compact('users','userc'));
    }

    

    // public function deleteUsers($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->back()->with('success', 'Student deleted successfully');
    // }

    public function TeacherLogout(){
        Auth::guard('teacher')->logout();
        return Redirect::to('teacher/login');
    }

        // Affiche le formulaire pour créer un nouveau niveau
        public function create()
        {
            return view('teacher.levels.create_level');
        }
    
        // Enregistre un nouveau niveau dans la base de données
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|unique:levels,name',
                'description' => 'required',
            ],[
                'name.required' => 'Le nom du niveau est obligatoire.',
                'name.max' => 'Le nom du niveau ne doit pas dépasser 255 caractères.',
                'description.required' => 'La description du niveau est obligatoire.',
            ]);
    
            $level = new Level([
                'name' => $request->get('name'),
                'description' => $request->get('description')
            ]);
            $level->save();
            return redirect('/teacher/dashboard')->with('success', 'Niveau enregistré avec succès');
        }


        public function getAllLevel()
        {
            $levels = Level::all();
    
            return view('teacher.levels.index', compact('levels'));
        }

        public function show($id)
        {
            $level = Level::find($id);
            return view('levels.show', compact('level'));
        }

            // Affiche le formulaire pour éditer un niveau spécifique
    public function edit($id)
    {
        $level = Level::find($id);
        return view('levels.edit', compact('level'));
    }

    // Met à jour un niveau spécifique dans la base de données
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:levels,name,'.$id,
            'description' => 'required',
        ]);

        $level = Level::find($id);
        $level->name = $request->get('name');
        $level->description = $request->get('description');
        $level->save();

        return redirect('/levels')->with('success', 'Niveau mis à jour avec succès');
    }

}
