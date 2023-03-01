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
    Route::get('/logout',[AdminController::class, 'AdminLogout'])
    ->name('admin.logout')->middleware('admin');
});

/* Admin Route */

/* Teacher Route */

Route::prefix('teacher')->group(function(){
    Route::get('/login',[TeacherController::class, 'TeacherIndex'])->name('teacher_login_form');
    Route::get('/dashboard',[TeacherController::class, 'TeacherDashboard'])
    ->name('teacher.dashboard')->middleware('Teacher');
    Route::post('/login/owner',[TeacherController::class,'TeacherLogin'])->name('teacher.login');
    Route::get('/logout',[TeacherController::class, 'TeacherLogout'])->name('teacher.logout')
   ->name('teacher.logout')->middleware('Teacher');
   Route::get('/register',[TeacherController::class,'TeacherRegister'])->name('teacher.register');
   Route::post('/register/create',[TeacherController::class,'TeacherRegisterCreate'])->name('teacher.register.create');
   
});

/* Teacher Route */



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
