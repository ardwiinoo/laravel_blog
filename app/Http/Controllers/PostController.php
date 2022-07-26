<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        // dd(request('search'));

        // agar judul halaman posts dapat berubah-ubah
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "Blog",
            // "posts" => Post::all() // menampilkan semua post urut dari id
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() //get() menampilkan post urut dari waktu terbaru dengan eager loading (filter() = method yg ada pada Model)
        ]);
    }

    // with(['user', 'category']) --> digunakan untuk mengatasi N+1 Problem

    public function show(Post $post) // route model binding
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "Blog",
            "post" => $post
        ]);
    }
}

