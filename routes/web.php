<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;



// Route::get('/', function () {
//     return view('front.login');
// });


// Route::get('home' , [FrontController::class, 'home'])->name('home');
Route::group(['prefix' => 'front' , 'as' => 'front.'], function()
{
    Route::get('home' , [FrontController::class,'home'])->name('home');


    Route::get('login' , [FrontController::class,'login'])->name('login');
    Route::post('login' , [FrontController::class,'login_submit'])->name('login_submit');


    Route::get('registration' , [FrontController::class,'registration'])->name('registration');
    Route::post('registration' , [FrontController::class,'registration_submit'])->name('registration_submit');
 
    
    Route::get('product' , [FrontController::class, 'product'])->name('product');

    Route::get('contact' , [FrontController::class,'contact'])->name('contact');

    Route::get('about' , [FrontController::class,'about'])->name('about');

    Route::get('blog_list' , [FrontController::class,'blog_list'])->name('blog_list');

    Route::get('testimonial' , [FrontController::class,'testimonial'])->name('testimonial');

    //Route::get('card' , [FrontController::class, 'card'])->name('card');
    Route::get('card',[FrontController::class, 'card'])->name('card');

    Route::get('without_login_card',[FrontController::class, 'without_login_card'])->name('without_login_card');


    Route::get('logout' , [FrontController::class,'logout'])->name('logout');


});

Route::group(['prefix' => 'admin' , 'as' => 'admin.'], function()
{
    Route::get('login' , [AdminController::class, 'login'])->name('login');
    Route::post('login' , [AdminController::class, 'login_submit'])->name('log');

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});


