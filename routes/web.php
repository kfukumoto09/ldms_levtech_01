<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LabNoteController;
use App\Http\Controllers\SearchController;
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


Route::middleware('auth')->group(function () {
    // projects, subjects
    Route::get('/projects/index', [ProjectController::class, 'index'])
                ->name('projects.index');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])
                ->where('project','[0-9]{0,3}')
                ->name('projects.show');
    Route::get('/subjects/{subject}', [SubjectController::class, 'show'])
                ->where('subject','[0-9]{0,6}')
                ->name('subjects.show');
    
    // create
    Route::get('/create/project', [ProjectController::class, 'create']);
    Route::post('/create/project', [ProjectController::class, 'store']);
    Route::get('/create/note/subject-{subject}', [LabNoteController::class, 'create']);
    Route::post('/create/note/subject-{fukumoto}', [LabNoteController::class, 'store']);
    Route::get('/mypage', [UserController::class, 'mypage'])->middleware(['auth']);
    
    // edit
    Route::get('/edit/note/subject-{subject}', [LabNoteController::class, 'edit']);
    
    // search
    Route::get('/search', [SearchController::class, 'search'])
                ->name('search');
    Route::get('/search/results', [SearchController::class, 'find'])
                ->name('search.results');
    // users
    Route::get('/users/player/authorize-projects', [PlayerController::class, 'edit_authorization']);
    Route::post('/users/player/authorize-projects', [PlayerController::class, 'update_authorization']);
    Route::get('/users/{user}', [UserController::class, 'show'])->name('usersmy');
    
    // console
    Route::get('/console', [UserController::class, 'console'])
                ->name('console');
    Route::get('/users/manager/authorize-projects', [ManagerController::class, 'edit_authorization']);
    Route::post('/users/manager/authorize-projects', [ManagerController::class, 'update_authorization']);
    
    // for test
    Route::get('/console/test', [UserController::class, 'test'])
                ->name('test')->middleware('can:create');
    Route::resource('tests', TestController::class);

});