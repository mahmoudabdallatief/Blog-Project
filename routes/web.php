<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\AuthMiddleware;

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



Route::get('/login', [AuthorController::class, 'login'])->name('login');
Route::post('/login-form', [AuthorController::class, 'login_form'])->name('login-form');
Route::get('/logout',[AuthorController::class,'logout'])->name('logout');
Route::get('/forgot-password',[AuthorController::class,'forgot_password'])->name('forgot-password');
Route::post('/sendresetemail', [AuthorController::class, 'sendResetLinkEmail'])->name('sendresetemail');
Route::get('/reset-form/{token}', [AuthorController::class, 'reset_form'])->name('reset-form');
Route::post('/reset_password', [AuthorController::class, 'reset_Password'])->name('reset-password');


Route::middleware([App\Http\Middleware\AuthMiddleware::class])->group(function (){
    Route::get('/',[PostController::class,'index'])->name('index');
    Route::get('/profile',[AuthorController::class,'profile'])->name('profile');
    Route::post('/updateuser',[AuthorController::class,'updateuser'])->name('updateuser');
    Route::post('/updatepassword',[AuthorController::class,'updatepassword'])->name('updatepassword');
    Route::post('/changepicture',[AuthorController::class,'changepicture'])->name('changepicture');
    Route::get('/settings',[AuthorController::class,'settings'])->name('settings');
    Route::post('/updategeneralsettings',[AuthorController::class,'updategeneralsettings'])->name('updategeneralsettings');
    Route::post('/updatelogo',[AuthorController::class,'updatelogo'])->name('updatelogo');
    Route::post('/updatesocialmedia',[AuthorController::class,'updatesocialmedia'])->name('updatesocialmedia');
    Route::get('/author',[AuthorController::class,'author'])->name('author');
    Route::post('/addauthor',[AuthorController::class,'addauthor'])->name('addauthor');
    Route::post('/updateauthor',[AuthorController::class,'updateauthor'])->name('updateauthor');
    Route::post('/deleteauthor',[AuthorController::class,'deleteauthor'])->name('deleteauthor');
    Route::get('/category',[categoryController::class,'index'])->name('category');
    Route::post('/addcat',[categoryController::class,'addcat'])->name('addcat');
    Route::post('/updatecat',[categoryController::class,'updatecat'])->name('updatecat');
    Route::post('/deletecat',[categoryController::class,'deletecat'])->name('deletecat');
    Route::post('/addsub',[categoryController::class,'addsub'])->name('addsub');
    Route::post('/updatesub',[categoryController::class,'updatesub'])->name('updatesub');
    Route::post('/deletesub',[categoryController::class,'deletesub'])->name('deletesub');
    Route::get('/addpost',[PostController::class,'addpost'])->name('addpost');
    Route::post('/addnewpost',[PostController::class,'addnewpost'])->name('addnewpost');
    Route::get('/allposts', function () {
        return view('back.pages.allposts');
    })->name('allposts');
    Route::get('/editpost/{id}',[PostController::class,'editpost'])->name('editpost');
    Route::post('/updatepost',[PostController::class,'updatepost'])->name('updatepost');
    Route::get('/{cat_id}', [PostController::class, 'index'])->name('{cat_id}');
    Route::get('/{tag}', [PostController::class, 'index'])->name('{tag}');
    Route::get('/single/{id}', [PostController::class, 'single'])->name('single');
});
