<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;





Route::get('/',[FrontController::class,'home']);


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


    Route::get('logout' , [FrontController::class,'logout'])->name('logout');


    Route::get('product_details' , [FrontController::class,'product_details'])->name('product_details');

    Route::get('logout',[FrontController::class, 'logout'])->name('logout');

});

Route::group(['prefix' => 'admin' , 'as' => 'admin.'], function()
{
    Route::get('login' , [AdminController::class, 'login'])->name('login');
    Route::post('login' , [AdminController::class, 'login_submit'])->name('log');

    Route::group(['middleware'=> 'admin'], function(){
    
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    });

});


