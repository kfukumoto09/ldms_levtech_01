<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubjectController;

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


Route::get('/', [ProjectController::class, 'index']);
Route::get('/project/{project}', [ProjectController::class, 'home'])
        ->where('project','[0-9]{0,3}');
Route::get('/project/1/{subject}', [SubjectController::class, 'home'])
        ->where('project_id','[0-9]{0,3}')
        ->where('subject','[0-9]{0,6}');