<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HeroController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SevicesController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\PortfolioController as FrontendPortfolioController;

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
//home
Route::get('/', [HomeController::class,'index'])->name('home');

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

//blog
Route::get('/blog', [FrontendBlogController::class, 'index'])->name('blog');
Route::get('/blog-details/{id}', [FrontendBlogController::class, 'show'])->name('blog.details');

//portfolio
Route::get('/portfolio-details/{id}', [FrontendPortfolioController::class, 'show'])->name('portfolio.details');

//resume
Route::get('/download/resume', [AboutController::class,'download_resume'])->name('resume.download');

//contact
Route::post('/contact', ContactController::class)->name('contact');







Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::resource('hero', HeroController::class);
    Route::resource('service', SevicesController::class);
    Route::resource('about', AboutController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('blog-category', BlogCategoryController::class);
    Route::resource('blog', BlogController::class);
});

//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
