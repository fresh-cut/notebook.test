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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['namespace'=>'\App\Http\Controllers\Blog','prefix'=>'blog'], function(){
    Route::resource('posts', 'PostController')->names('blog.posts')->middleware('auth');
});


// Админка Блога
$groupData=[
    'namespace'=>'\App\Http\Controllers\Blog\Admin',
    'prefix'=>'admin/blog', // то что будет в строке url после имени сайта
];
Route::group($groupData, function(){
    // BlogCategory
    $methods=['index', 'edit', 'store','update', 'create'];
    Route::resource('categories', 'CategoryController')->only($methods)
        ->names('blog.admin.categories');

    // BlogPost
    Route::resource('posts', 'PostController')
        ->except('show') // все ресурсные маршруты кроме show
        ->names('blog.admin.posts');
});
