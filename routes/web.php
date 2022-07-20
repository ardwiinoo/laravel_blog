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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Arif Dwi Nugroho",
        "email" => "ardwiinoo@gmail.com",
        "image" => "profil.png"
    ]);
});


Route::get('/blog', function () {

    $blog_post = [
    [
        "title" => "Judul post pertama",
        "slug" => "judul-post-pertama",
        "author" => "Arif Dwi N",
        "body" => "Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Maxime, consequatur enim, necessitatibus ad incidunt omnis voluptatem minima, dolore, accusantium laudantium expedita ipsa totam. Autem voluptatibus cum obcaecati magnam excepturi sequi!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
    ],
      [
        "title" => "Judul post kedua",
        "slug" => "judul-post-kedua",
        "author" => "Nugroho",
        "body" => "Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Maxime, consequatur enim, necessitatibus ad incidunt omnis voluptatem minima, dolore, accusantium laudantium expedita ipsa totam. Autem voluptatibus cum obcaecati magnam excepturi sequi!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
    ]
];

    return view('posts', [
        "title" => "Blog",
        "posts" => $blog_post
    ]);
});

Route::get('posts/{slug}', function($slug) {

        $blog_post = [
    [
        "title" => "Judul post pertama",
        "slug" => "judul-post-pertama",
        "author" => "Arif Dwi N",
        "body" => "Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Maxime, consequatur enim, necessitatibus ad incidunt omnis voluptatem minima, dolore, accusantium laudantium expedita ipsa totam. Autem voluptatibus cum obcaecati magnam excepturi sequi!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
    ],
      [
        "title" => "Judul post kedua",
        "slug" => "judul-post-kedua",
        "author" => "Nugroho",
        "body" => "Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Maxime, consequatur enim, necessitatibus ad incidunt omnis voluptatem minima, dolore, accusantium laudantium expedita ipsa totam. Autem voluptatibus cum obcaecati magnam excepturi sequi!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod"
    ]
];

    $new_post = [];
    foreach($blog_post as $post) {
        if($post['slug'] === $slug) {
            $new_post = $post;
        }
    }

    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});
