<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        // dd(request('search'));

        $posts = Post::latest(); // ambil semua post urut terbaru

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%'); // jika search diisi maka akan ditambahkan where sebelum latest()
        }

        return view('posts', [
            "title" => "All Posts",
            "active" => "Blog",
            // "posts" => Post::all() // menampilkan semua post urut dari id
            "posts" => $posts->get() // menampilkan post urut dari waktu terbaru dengan eager loading
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

