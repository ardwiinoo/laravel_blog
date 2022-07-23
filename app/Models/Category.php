<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relasi category -- post (satu category bisa banyak post) : 1 to Many
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
