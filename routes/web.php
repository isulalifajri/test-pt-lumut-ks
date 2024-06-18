<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;

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


Route::get('/', function() {
    return view('page.home', [
        'title' => 'Halaman Home',
    ]);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/tambah-data', [PostController::class, 'create'])->name('tambah-post');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('destroy.post');
    Route::get('/posts/edit-data/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/store', [PostController::class, 'store'])->name('store.post');
    Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('update.post');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
   
    //route users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/data', [UserController::class, 'dataUsers'])->name('users.data');
    Route::get('/users/tambah-data', [UserController::class, 'create'])->name('tambah-data');
    Route::get('/users/edit-data/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/store', [UserController::class, 'store'])->name('store');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('users/{id}', [UserController::class, 'userDetail'])->name('users.detail');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('destroy');
    
});
