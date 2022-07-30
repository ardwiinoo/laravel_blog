<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    //protected $fillable = ['title', 'excerpt', 'body']; // ini yang boleh diisi sisanya gaboleh
    protected $guarded = ['id']; // ini yang gaboleh diisi sisanya boleh
    protected $with = ['category', 'user']; // eager loading

    // // untuk slugabble
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    // untuk fitur search
    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')->orWhere('body', 'like', '%' . $filters['search'] . '%'); // jika search diisi maka akan ditambahkan where sebelum latest()
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%'); // jika search diisi maka akan ditambahkan where sebelum latest()
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'user',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    // relasi post -- category (satu post hanya memiliki satu category) : 1 to 1 (belongsTo)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // setiap route otomatis mencari slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
