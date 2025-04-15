<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileHandlingController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Mail\EmailController;

use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\EveningCheck;

Route::get('/', [AuthenticatedSessionController::class,'create'])->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('checkMid')->group(function(){
    Route::get('/restricted', function () {
        return "You are allowed. Age is OK.";
    })->middleware(AgeCheck::class);
    
    
    Route::get('/admin',function(){
        return 'this is admin page';
    });
    
    Route::get('/eve',function(){
        return 'it is evening';
    });
});
Route::get('/no-access', function () {
    return "Sorry! You are not allowed.";
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::view('/files','fileHandling');
    Route::post('/files/store',[FileHandlingController::class,'store'])->name('files.store');
    Route::group(['prefix'=>'post', 'as' => 'post.'],function(){
        Route::get('/index',[PostController::class,'index'])->name('index');
        Route::get('/create',[PostController::class,'create'])->name('create');
        Route::post('/store',[PostController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PostController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[PostController::class,'update'])->name('update');
        Route::get('/delete/{id}',[PostController::class,'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'category', 'as' => 'category.'],function(){
        Route::get('/index',[CategoryController::class,'index'])->name('index');
        Route::get('/create',[CategoryController::class,'create'])->name('create');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
    });
    Route::group(['prefix' => 'user', 'as' => 'user.'],function(){
        Route::get('/index',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/store',[UserController::class,'store'])->name('store');
    });
   Route::group(['prefix' => 'mail', 'as' => 'mail.'],function(){
        Route::get('/job-application',[EmailController::class,'jobApplication'])->name('jobApplication');
        Route::post('/sand-job-mail',[EmailController::class,'jobMail'])->name('jobMail');
        Route::view('/thank-you','mail.thankyou')->name('thankyou');
        Route::get('/applicant-list',[EmailController::class,'index'])->name('index');
   });
});

require __DIR__.'/auth.php';
