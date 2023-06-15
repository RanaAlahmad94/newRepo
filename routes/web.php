<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\areaController;
use App\Http\Controllers\familyController;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
   

});
Route::resource('/families',familyController::class);
Route::resource('/areas',areaController::class);    
Route::resource('/posts',postController::class);

// Route::get('/', function () {
//     return view('posts');
// })->middleware('auth', 'role:Admin');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts/deletedPosts', [postController::class, 'deletedPosts'])->name('posts.deletedPosts');
Route::put('/posts/{post}/restore', [postController::class, 'restore'])->name('posts.restore');
