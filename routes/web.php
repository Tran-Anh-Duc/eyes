<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GitHubController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserController;
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


Route::get('/login', [AuthController::class, "showFormLogin"])->name("admin.showFormLogin");
Route::post('/login', [AuthController::class, "login"])->name("admin.login");
Route::get('/register', [AuthController::class, "showFormRegister"])->name("admin.showFormRegister");
Route::post('/register', [AuthController::class, "register"])->name("admin.register");
Route::get('/logout', [AuthController::class, "logout"])->name("admin.logout");

Route::middleware('auth')->group(function () {
    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'showFormCreate'])->name('categories.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/detail/{id}', [CategoryController::class, 'showDetail'])->name('categories.show');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/edit/{id}', [CategoryController::class, 'showFormEdit'])->name('categories.showFormEdit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
    });
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, "index"])->name('users.index');
        Route::get('/create', [UserController::class, "showFormCreate"])->name('users.create');
        Route::post('/create', [UserController::class, "store"])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, "showFormEdit"])->name('users.showFormEdit');
        Route::post('/edit/{id}', [UserController::class, "update"])->name('users.update');
    });

});

//Route::get('/auth/redirect/github', [GitHubController::class, 'gitRedirect']);
//Route::get('/callback/github', [GitHubController::class, 'gitCallback']);

Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
//Route::prefix('google')->group(function (){

Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [SocialController::class, 'callback']);
//});



//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
