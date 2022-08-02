<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LabNoteController;
use App\Http\Controllers\TestController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/projects/index', [ProjectController::class, 'index']);
Route::get('/projects/index', [ProjectController::class, 'index'])
            ->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])
            ->where('project','[0-9]{0,3}')
            ->name('projects.show');
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])
            ->where('subject','[0-9]{0,6}')
            ->name('subjects.show');

// create
Route::get('/create/note/subjects/{subject}', [LabNoteController::class, 'create']);
Route::post('/create/note/subject-{subject_id}', [LabNoteController::class, 'store']);
        
Route::get('/mypage', [UserController::class, 'mypage'])->middleware(['auth']);

// users
// Route::get('/users/register', [UserController::class, 'create']);
Route::get('/users/authorize', [UserController::class, 'edit_player']);
// Route::post('/users', [UserController::class, 'update_player']);
Route::post('/users/{user_id}', [UserController::class, 'update_player']);
Route::get('/users/{user}', [UserController::class, 'show'])->name('usersmy');

// console
Route::get('/console', [UserController::class, 'console'])
            ->name('console');
Route::get('/console/authorize', [UserController::class, 'edit_manager'])
            ->name('aut');
Route::get('/console/test', [UserController::class, 'test'])
            ->name('test');

Route::resource('tests', TestController::class);