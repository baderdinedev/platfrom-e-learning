<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\UserClassController;
use App\Http\Controllers\FormationLessonController;
use App\Http\Controllers\exportDataController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CertificateController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/* Admin Route */



Route::prefix('admin')->group(function(){    
    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'destroy'])->name('admin.logout')->middleware('admin');
            //Route::get('password/reset', [ForgotPasswordController::class,'showResetForm'])->name('password.reset');
            //Route::post('admin/forget-password', [AdminController::class,'forgetPassword'])->name('admin.forgetPassword');
        // Route to show the update form
        //Route::get('/students', [AdminController::class, 'SearchStudent'])->name('students.index');
        Route::put('students/{id}/deactivate', [AdminController::class, 'deactivate'])->name('students.deactivate');
        Route::put('students/{id}/activate', [AdminController::class, 'activate'])->name('students.activate');
        Route::get('/profile', [AdminController::class, 'Profile'])->name('admin.profile');
        Route::get('edit/profile', [AdminController::class, 'EditProfile'])->name('update.profile');
        Route::post('store/profile',[AdminController::class, 'StoreProfile'])->name('store.profile');
        Route::get('/manage-student', [AdminController::class, 'manageStudent'])->name('manage_student');
        Route::get('/manage-teacher', [AdminController::class, 'manageTeacher'])->name('manage_teacher');
        Route::get('/lessons-show', [AdminController::class, 'LessonShow'])->name('lessons_show');
        Route::get('/levels-show', [AdminController::class, 'LevelShow'])->name('level_show');
        Route::delete('/student/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteStudent');
        Route::delete('/teacher/{id}', [AdminController::class, 'deleteTeacher'])->name('admin.deleteteacher');
        Route::get('/student/{id}/certificat', [AdminController::class, 'manageCerticate'])->name('sertificat');
        Route::post('/certificate/attribute/{id}', [AdminController::class, 'attribute'])->name('certificate.attribute');

        Route::get('/curves', [ChartController::class, 'showAllCurves'])->name('curves');
        Route::get('/cu', [ChartController::class, 'getUserByLevel'])->name('cu');
        Route::get('/teacherBydate', [ChartController::class, 'showChart'])->name('teacherInscriptedBydate');
        Route::get('/users/export-csv', [exportDataController::class, 'exportCsv'])->name('export-users');
        Route::get('/export-teachers',[exportDataController::class, 'exportTeachers'])->name('export-teachers');
        Route::get('export-news', [exportDataController::class, 'exportNews'])->name('news.export');
   });

});

/* Admin Route */

/* Teacher Route */

Route::prefix('teacher')->group(function(){

    Route::get('/profile', [TeacherController::class, 'Profile'])->name('teacher.profile');
    Route::get('edit/profile', [TeacherController::class, 'EditProfile'])->name('teacher_update.profile');
    Route::post('store/profile',[TeacherController::class, 'StoreProfile'])->name('teacher_store.profile');
    Route::get('/login',[TeacherController::class, 'TeacherIndex'])->name('teacher_login_form');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.forgot');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot.password.email');


    Route::get('/dashboard',[TeacherController::class, 'TeacherDashboard'])
    ->name('teacher.dashboard')->middleware('Teacher');
    Route::post('/login/owner',[TeacherController::class,'TeacherLogin'])->name('teacher.login');
    Route::get('/logout',[TeacherController::class, 'TeacherLogout'])->name('teacher.logout');
    Route::get('/register',[TeacherController::class,'showRegistrationForm'])->name('teacher.register');
    Route::post('/register/create',[TeacherController::class,'TeacherRegisterCreate'])->name('teacher.register.create');
    Route::get('/manage-student', [TeacherController::class, 'manageStud'])->name('student_manage');
   // Route::delete('/student/{id}', [TeacherController::class, 'deleteUsers'])->name('teacher.deleteStudent');
    Route::get('/students', [TeacherController::class, 'SearchStudent'])->name('students.index');
    // Levels Router
    Route::get('/levels', [LevelController::class, 'index'])->name('level_list');
    Route::get('/levels/create', [LevelController::class, 'create'])->name('create_leavel');
    Route::post('/levels', [LevelController::class, 'store'])->name('store');
    Route::get('/levels/{id}', [LevelController::class, 'show'])->name('levels.show');
    Route::get('/levels/{id}/edit', [LevelController::class, 'edit'])->name('levels.edit');
    Route::put('/levels/{id}', [LevelController::class, 'update'])->name('levels.update');
    Route::delete('/levels/{id}', [LevelController::class, 'destroy'])->name('levels.destroy');
    // Lesson Route
    Route::get('/les/create', [LessonController::class, 'create'])->name('lesson_create');
    Route::post('/lessons', [LessonController::class, 'store'])->name('storelessons');
    Route::get('/lessons', [LessonController::class, 'index'])->name('lesson_list');
    Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
    Route::get('/lessons/{id}/edit', [LessonController::class, 'edit'])->name('lessons.edit'); 
    Route::put('/lessons/{id}/', [LessonController::class, 'update'])->name('lesson.update');
    Route::delete('/lessons/{id}', [LessonController::class, 'delete'])->name('lessons.destroy');;
    // Lesson Route
    // statistique Route
    Route::get('/stats/polar-chart', [StatsController::class, 'showPolarAreaChart']);
    Route::get('/stats',[StatsController::class, 'index'])->name('stats');
    // statistique Route

    // News Or Blog
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/create-news', [NewsController::class, 'create'])->name('add_news'); 
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    // News Or Blog

    // classeRoom
    Route::get('/classroom-managment', [ClassController::class, 'index'])->name('managment-class');
    Route::get('/classroom/create', [ClassController::class, 'create'])->name('classroom.create');
    Route::post('/classes', [ClassController::class, 'store'])->name('classroom.store');
    // classeRoom

    // Formation
    Route::get('/managment-formations', [FormationController::class, 'index'])->name('managment-formation');
    Route::get('/formation/create', [FormationController::class, 'create'])->name('formation.create');
    Route::post('/formation', [FormationController::class, 'store'])->name('formation.store');
    Route::get('/managment-formations/{formation}', [FormationController::class, 'show'])->name('formations.show');
    Route::get('formations/{formation}/edit', [FormationController::class, 'edit'])->name('formations.edit');
    Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formations.update');
    Route::put('formations/{formation}/hide', [FormationController::class, 'hide'])->name('formations.hide');
    Route::put('formations/{formation}/unhide', [FormationController::class, 'unhide'])->name('formations.unhide');
    Route::get('lesson/download/{id}',[FormationController::class, 'download'])->name('lesson.download');

    Route::get('/formations/search', [FormationController::class, 'search'])->name('formations.search');

    Route::get('/formation-lessons', [FormationLessonController::class, 'create'])->name('formation-lessons.index');
    Route::post('/formations-lessons', [FormationLessonController::class, 'store'])->name('formations-lessons.store');
    Route::get('/formations-lessons-list', [FormationLessonController::class, 'index'])->name('formations-lessons-list');
    Route::delete('/formation-lesson/{formationLesson}', [FormationLessonController::class, 'destroy'])->name('formation-lesson.destroy');


        

});

/* Teacher Route */



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/notfound', function () {
    return view('notfound');
})->name('notfound');

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



Route::get('/blog' ,[ProfileController::class,'viewBlog'] , function () {
    return view('blog.index');
})->middleware(['auth', 'verified'])->name('blog');

Route::get('/chat' ,[ProfileController::class,'viewChat'] , function () {
    return view('chat.index');
})->middleware(['auth', 'verified'])->name('chat');




Route::group(['middleware' => ['auth', 'active']], function () {
    Route::get('/user-info', [UserController::class, 'showUserInfo'])->name('users.show-info'); 
    Route::get('/user/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/change-password', [UserController::class, 'showChangePasswordForm'])->name('users.change-password');
    Route::post('/users/change-password', [UserController::class, 'changePassword'])->name('users.update-password');
    Route::get('/dashboard/{id}',[ProfileController::class,'introduction'])->name('introduction');
    Route::get('/dashboard',[UserController::class,'getLesson'])->name('dashboard');
    Route::get('/dashboard/{id}',[UserController::class,'show'])->name('index');
    Route::get('/introduction/{id}',[UserController::class,'introduction'])->name('introduction');
    Route::get('/test/{id}',[UserController::class,'test'])->name('test');
    Route::get('/courses/{id}', [CoursesController::class, 'index'])->name('course');
    Route::get('/profile', [UserController::class, 'completeUserInfo'])->name('profile');
    Route::get('/certificate/{id}', [CertificateController::class, 'show'])->name('certificate.show');
   // Route::get('dashboard/news', [NewsController::class, 'index'])->name('news'); 

    Route::get('/api/v2/classrom', [UserClassController::class, 'index'])->name('join-class'); 
   // Route::get('/formation', [FormationController::class, 'index'])->name('formation'); 
    Route::get('/api/v2/{id}/join', [UserClassController::class, 'showJoinForm'])->name('classes.join');

   // news for students 
   Route::get('/blog', [NewsController::class, 'userIndex'])->name('student-news');
   Route::get('/blog/{id}', [NewsController::class, 'newsShow'])->name('blog-show');

   Route::post('/blog/{id}/like', [UserController::class, 'likeOrDislike'])->name('news.like');
   Route::post('/blog/{id}/comment', [UserController::class, 'comment'])->name('news.comment');
   Route::post('/api/v2/{classroom}', [UserClassController::class, 'join'])->name('classroom.join');
   Route::get('/classrooms/{classroom}/formations/{formation_id}/learn', [UserClassController::class, 'learn'])->name('classroom.learn');


});






require __DIR__.'/auth.php';
