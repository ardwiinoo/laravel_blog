<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'excerpt', 'body']; // ini yang boleh diisi sisanya gaboleh
    protected $guarded = ['id']; // ini yang gaboleh diisi sisanya boleh

    // relasi post -- category (satu post hanya memiliki satu category) : 1 to 1 (belongsTo)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
