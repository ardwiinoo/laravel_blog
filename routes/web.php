<?php


use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
    return view('home', [
        "title" => "Home",
        'active' => 'Home',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'About',
        "name" => "Arif Dwi Nugroho",
        "email" => "ardwiinoo@gmail.com",
        "image" => "profil.png"
    ]);
});


Route::get('/blog', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show']); //posts/{post:slug} akan mengirim slug post, jika hanya posts/{post} akan secara default mengirim id

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'Categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'Categories',
//         'posts' => $category->posts->load('category', 'user') // lazy eager loading
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'Blog',
//         'posts' => $author->posts->load('category', 'user') // lazy eager loading
//     ]);
// });

// sudah ditangani pada query model

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); // hanya bisa diakses user yang belum authentikasi
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth'); // hanya bisa diakses user yang sudah authentikasi

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// controller otomatis kelola data crud
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
