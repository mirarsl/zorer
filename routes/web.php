<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyVoyagerController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    
    Route::post('orderFiles/{table}/{field}/{id}', [MyVoyagerController::class,'orderFiles'])->name('voyager.orderFiles');
    Route::post('orderImages/{table}/{field}/{id}', [MyVoyagerController::class,'orderImages'])->name('voyager.orderImages');
});

include 'redirects.php';


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::get(LaravelLocalization::transRoute('routes.sitemap'), [PageController::class, 'sitemap'])->name('sitemap');
    
    Route::get(LaravelLocalization::transRoute('routes.home'), [HomeController::class, 'index'])->name('home');   
    Route::get(LaravelLocalization::transRoute('routes.search'), [PageController::class, 'search'])->name('search');
    Route::get(LaravelLocalization::transRoute('routes.product'), [PageController::class,'product'])->name('product');
    Route::get(LaravelLocalization::transRoute('routes.news'), [PageController::class,'news'])->name('news');
    Route::get(LaravelLocalization::transRoute('routes.blog'), [PageController::class,'blog'])->name('blog');
    Route::get(LaravelLocalization::transRoute('routes.page'), [PageController::class,'index'])->name('page')->where('slug','.*');


    Route::post(LaravelLocalization::transRoute('routes.store'), [PageController::class,'store'])->name('store');
});


