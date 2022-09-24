<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SitePageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/new/category', [NewsController::class, 'category'])
    ->name('sitePage.categoryNewsPage');


Route::get('/', [SitePageController::class, 'homePage'])
    ->name('sitePage.homePage');


Route::middleware('auth')->group(function() {
    Route::get('/account', AccountController::class)->name('account');
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'is_admin'
    ], function() {
        Route::get('/', AdminController::class)->name('index');
        Route::resource('articles', AdminArticleController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::resource('users', AdminUserController::class);
    });
});

Route::resource('order', OrderController::class);
Route::resource('comment', CommentController::class);

Route::get('/sessions', function() {
    $name = 'example';
    if(session()->has($name)) {
        
        session()->remove($name);
    }
  //  session()->get($name);
    dd(session()->all());
    session()->put($name, 'Test example session');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
