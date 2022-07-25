<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Use Faker Library
        User::factory(3)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // seed author
        // User::create([
        //     'name' => 'Arif Dwi Nugroho',
        //     'email' => 'ardwiinoo@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Budi Sasangka',
        //     'email' => 'sasangkabudi@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // seed category
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        // seed post
        Post::factory(20)->create();
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula sit amet tellus sed facilisis. Praesent quis mauris vitae augue egestas aliquet. Aenean lobortis, lectus nec commodo tincidunt,</p><p>lorem justo scelerisque enim, bibendum posuere lectus augue non nibh. Fusce non massa ut eros vestibulum malesuada. Sed risus ex, interdum ut lorem ac, rhoncus aliquam neque. Pellentesque non congue tortor. Duis non tincidunt turpis, sed tincidunt felis. Praesent quis auctor massa. Nam id ante a est ultrices malesuada. Vivamus vel velit fermentum, pellentesque risus ut, facilisis elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ac tempor magna, vel ultrices ante.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula sit amet tellus sed facilisis. Praesent quis mauris vitae augue egestas aliquet. Aenean lobortis, lectus nec commodo tincidunt,</p><p>lorem justo scelerisque enim, bibendum posuere lectus augue non nibh. Fusce non massa ut eros vestibulum malesuada. Sed risus ex, interdum ut lorem ac, rhoncus aliquam neque. Pellentesque non congue tortor. Duis non tincidunt turpis, sed tincidunt felis. Praesent quis auctor massa. Nam id ante a est ultrices malesuada. Vivamus vel velit fermentum, pellentesque risus ut, facilisis elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ac tempor magna, vel ultrices ante.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula sit amet tellus sed facilisis. Praesent quis mauris vitae augue egestas aliquet. Aenean lobortis, lectus nec commodo tincidunt,</p><p>lorem justo scelerisque enim, bibendum posuere lectus augue non nibh. Fusce non massa ut eros vestibulum malesuada. Sed risus ex, interdum ut lorem ac, rhoncus aliquam neque. Pellentesque non congue tortor. Duis non tincidunt turpis, sed tincidunt felis. Praesent quis auctor massa. Nam id ante a est ultrices malesuada. Vivamus vel velit fermentum, pellentesque risus ut, facilisis elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ac tempor magna, vel ultrices ante.</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);


        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula sit amet tellus sed facilisis. Praesent quis mauris vitae augue egestas aliquet. Aenean lobortis, lectus nec commodo tincidunt,</p><p>lorem justo scelerisque enim, bibendum posuere lectus augue non nibh. Fusce non massa ut eros vestibulum malesuada. Sed risus ex, interdum ut lorem ac, rhoncus aliquam neque. Pellentesque non congue tortor. Duis non tincidunt turpis, sed tincidunt felis. Praesent quis auctor massa. Nam id ante a est ultrices malesuada. Vivamus vel velit fermentum, pellentesque risus ut, facilisis elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ac tempor magna, vel ultrices ante.</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}
