<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Task;
use App\Http\Controllers\TaskController;
use Facade\Ignition\Tabs\Tab;
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

Route::get('/dashboard', function () {
    return view('bash');
})->middleware(['auth'])->name('dashboard');

Route::get('/categories',[CategoryController::class,'index'])->middleware('auth');
Route::get('/categories/create',[CategoryController::class,'create'])->middleware('auth');
Route::post('/categories',[CategoryController::class,'store'])->middleware('auth');
Route::post('/categories/{id}',[CategoryController::class,'destroy'])->middleware('auth');
Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->middleware('auth');
Route::put('/categories/{id}',[CategoryController::class,'update'])->middleware('auth');

Route::resource('tasks',TaskController::class)->except('destroy')->middleware('auth');
Route::post('/tasks/{id}',[Task::class,'destroy'])->middleware('auth');
// Route::get('/tasks/create',[TaskController::class,'create'])->middleware('auth');
// Route::post('/tasks',[TaskController::class,'store'])->middleware('auth');
// Route::get('/tasks',[TaskController::class,'index'])->middleware('auth');

require __DIR__.'/auth.php';
