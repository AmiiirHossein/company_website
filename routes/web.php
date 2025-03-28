<?php

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

//front
Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('front.index');
Route::get('/blog',[\App\Http\Controllers\Front\HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{id}',[\App\Http\Controllers\Front\HomeController::class, 'blogDetail'])->name('blog.detail');
Route::post('/contact',[\App\Http\Controllers\Front\HomeController::class, 'contact'])->name('contact.ajax');
Route::post('/comment',[\App\Http\Controllers\Front\HomeController::class, 'comment'])->name('comment.ajax');
Route::get('/search/{id}',[\App\Http\Controllers\Front\HomeController::class, 'search'])->name('search');



//admin
Route::get('/dashboard', [\App\Http\Controllers\Administrator\PanelController::class, 'first'])->middleware(['auth'])->name('dashboard');


Route::middleware(['auth','admin'])->prefix('/dashboard')->group(function(){
    Route::resource('/users', \App\Http\Controllers\Administrator\UserController::class)->parameters(['users'=>'id']);
    Route::resource('/seo', \App\Http\Controllers\Administrator\SeoController::class)->parameters(['seo'=>'id']);
    Route::resource('/topHeader', \App\Http\Controllers\Administrator\TopHeaderController::class)->parameters(['topHeader'=>'id']);
    Route::resource('/header', \App\Http\Controllers\Administrator\HeaderController::class)->parameters(['header'=>'id']);
    Route::resource('/home', \App\Http\Controllers\Administrator\HeroController::class)->parameters(['home'=>'id']);
    Route::resource('/about', \App\Http\Controllers\Administrator\AboutController::class)->parameters(['about'=>'id']);
    Route::resource('/intro', \App\Http\Controllers\Administrator\IntroController::class)->parameters(['intro'=>'id']);
    Route::resource('/service', \App\Http\Controllers\Administrator\ServiceController::class)->parameters(['service'=>'id']);
    Route::resource('/counter', \App\Http\Controllers\Administrator\CounterController::class)->parameters(['counter'=>'id']);
    Route::resource('/team', \App\Http\Controllers\Administrator\TeamController::class)->parameters(['team'=>'id']);
    Route::resource('/project', \App\Http\Controllers\Administrator\ProjectController::class)->parameters(['project'=>'id']);
    Route::resource('/testimonial', \App\Http\Controllers\Administrator\TestimonialController::class)->parameters(['testimonial'=>'id']);
    Route::resource('/faq', \App\Http\Controllers\Administrator\FaqController::class)->parameters(['faq'=>'id']);
    Route::resource('/footerAbout', \App\Http\Controllers\Administrator\FooterAboutController::class)->parameters(['footerAbout'=>'id']);
    Route::resource('/footerService', \App\Http\Controllers\Administrator\FooterServiceController::class)->parameters(['footerService'=>'id']);
    Route::resource('/footerQuick', \App\Http\Controllers\Administrator\FooterQuickController::class)->parameters(['footerQuick'=>'id']);
    Route::resource('/footerContact', \App\Http\Controllers\Administrator\FooterContactController::class)->parameters(['footerContact'=>'id']);
    Route::resource('/category', \App\Http\Controllers\Administrator\CategoryController::class)->parameters(['category'=>'id']);
});

Route::middleware(['auth','author'])->prefix('/dashboard')->group(function(){
    Route::resource('/blog', \App\Http\Controllers\Administrator\BlogController::class)->parameters(['blog'=>'id']);
    Route::resource('/contact', \App\Http\Controllers\Administrator\ContactController::class)->parameters(['contact'=>'id']);
    Route::resource('/comment', \App\Http\Controllers\Administrator\CommentController::class)->parameters(['comment'=>'id']);
});



require __DIR__.'/auth.php';
