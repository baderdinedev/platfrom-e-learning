<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/* Admin Route */

Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])
    ->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'destroy'])
    ->name('admin.logout')->middleware('admin');
   // Route to show the update form
   Route::get('/profile', [AdminController::class, 'Profile'])->name('admin.profile');
   Route::get('edit/profile', [AdminController::class, 'EditProfile'])->name('update.profile');
   Route::post('store/profile',[AdminController::class, 'StoreProfile'])->name('store.profile');
   Route::get('/manage-student', [AdminController::class, 'manageStudent'])->name('manage_student');
   Route::get('/manage-teacher', [AdminController::class, 'manageTeacher'])->name('manage_teacher');
   Route::get('/lessons-show', [AdminController::class, 'LessonShow'])->name('lessons_show');
   Route::get('/levels-show', [AdminController::class, 'LevelShow'])->name('level_show');
   Route::delete('/student/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteStudent');
   Route::delete('/teacher/{id}', [AdminController::class, 'deleteTeacher'])->name('admin.deleteteacher');
   Route::get('/student/certificat', [AdminController::class, 'manageCerticate'])->name('sertificat'); 
});

/* Admin Route */

/* Teacher Route */

Route::prefix('teacher')->group(function(){
    Route::get('/login',[TeacherController::class, 'TeacherIndex'])->name('teacher_login_form');
    Route::get('/dashboard',[TeacherController::class, 'TeacherDashboard'])
    ->name('teacher.dashboard')->middleware('Teacher');
    Route::post('/login/owner',[TeacherController::class,'TeacherLogin'])->name('teacher.login');
    Route::get('/logout',[TeacherController::class, 'TeacherLogout'])->name('teacher.logout')->name('teacher.logout')->middleware('Teacher');
   Route::get('/register',[TeacherController::class,'TeacherRegister'])->name('teacher.register');
   Route::post('/register/create',[TeacherController::class,'TeacherRegisterCreate'])->name('teacher.register.create');
   Route::get('/manage-student', [TeacherController::class, 'manageStud'])->name('student_manage');
   Route::delete('/student/{id}', [AdminController::class, 'deleteUsers'])->name('teacher.deleteStudent');

});

/* Teacher Route */



Route::get('/', function () {
    return view('welcome');
});

Route::get('/notfound', function () {
    return view('notfound');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/team', function () {
    return view('ourteam');
});

Route::get('/testimonial', function () {
    return view('testimonial');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/dashboard',[ProfileController::class,'getLesson'] ,function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/blog' ,[ProfileController::class,'viewBlog'] , function () {
    return view('blog.index');
})->middleware(['auth', 'verified'])->name('blog');

Route::get('/chat' ,[ProfileController::class,'viewChat'] , function () {
    return view('chat.index');
})->middleware(['auth', 'verified'])->name('chat');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/introduction/{id}',[ProfileController::class,'introduction'])->name('introduction');
});



require __DIR__.'/auth.php';
