<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
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


Route::get('/index', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'home'])
        ->where('project','[0-9]{0,3}');
Route::get('/projects/create', [ProjectController::class, 'create']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/subjects/{subject}', [SubjectController::class, 'home'])
        ->where('project_id','[0-9]{0,3}')
        ->where('subject','[0-9]{0,6}');
        
Route::get('/mypage', [UserController::class, 'mypage'])->middleware(['auth']);

// users
// Route::get('/users/register', [UserController::class, 'create']);
Route::get('/users/authorize', [UserController::class, 'edit_player']);
// Route::post('/users', [UserController::class, 'update_player']);
Route::post('/users/{user_id}', [UserController::class, 'update_player']);
Route::get('/users/{user}', [UserController::class, 'show']);

// console
Route::get('/console', [UserController::class, 'console']);
Route::get('/console/authorize', [UserController::class, 'edit_manager']);
Route::get('/console/test', [UserController::class, 'test']);

Route::resource('tests', TestController::class);
