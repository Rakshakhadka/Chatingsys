<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Supervisor\AssignmentController;
use App\Http\Controllers\Supervisor\AttendanceController;
use App\Http\Controllers\Supervisor\ClassroutineController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/dashboard',[DashboardController::class,'dashboard'])->middleware('auth');

Auth::routes();

// Route::get('/login', [SupervisorController::class, 'index'])->name('login');
// Route::post('/custom-signin', [SupervisorController::class, 'createSignin'])->name('signin.custom');


// Route::get('/register', [SupervisorController::class, 'signup'])->name('register');
// Route::post('/create-user', [SupervisorController::class, 'customSignup'])->name('user.registration');


// Route::get('/dashboard', [SupervisorController::class, 'dashboardView'])->name('dashboard');
// Route::get('/logout', [SupervisorController::class, 'logout'])->name('logout');

    Route::get('/student',[StudentController::class,'index'] );
    Route::get('/supervisor/login',[SupervisorController::class,'login']);
    Route::post('/supervisor/login/check',[SupervisorController::class,'logincheck'])->name('supervisor.login');
    Route::resource('supervisor/assignment', AssignmentController::class);
    Route::resource('supervisor/attendance', AttendanceController::class);
    Route::resource('supervisor/classroutine', ClassroutineController::class);

// Route::get('/supervisor/register',[SupervisorController::class,'register']);





