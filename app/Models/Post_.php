<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
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

    public static function all()
    {
        return collect(self::$blog_posts); // ubah array jadi collection, self --> property static
    }

    public static function find($slug)
    {
        $posts = static::all(); // static --> method static

        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
