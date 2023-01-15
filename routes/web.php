<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsenseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SlideController;
use App\Models\Post;
use Illuminate\Support\Facades\App;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/homepage', [FrontendController::class, 'index']);
Route::get('/show-details/{slug}', [FrontendController::class, 'detail']);
Route::get('categories', [FrontendController::class, 'categories']);
Route::get('/view-category/{slug}', [FrontendController::class, 'viewcategory']);

Auth::routes();

Route::get('/homepage', function () {
    return redirect('/homepage');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('category', CategoryController::class);
Route::resource('articles', ArticleController::class);
Route::resource('playlist', PlaylistController::class);
Route::resource('materials', MaterialController::class);
Route::resource('slides', SlideController::class);
Route::resource('adsenses', AdsenseController::class);

