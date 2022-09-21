<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ["id", "published_at", "created_at", "updated_at"];
    //protected $fillable = ["title", "brief", "body"];

    protected $with = ["category", "author"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function scopeFilter($query, $filters) {
        
        if ($filters["q"] ?? false) {
            $query->where(fn($query) =>
                $query
                    ->where('title', 'like', '%' . $filters['q'] . '%')
                    ->orWhere('brief', 'like', '%' . $filters['q'] . '%')
                    ->orWhere('body', 'like', '%' . $filters['q'] . '%')
            );
        }
        
        if ($filters["c"] ?? false) {
            
            /* $query->whereExists(fn($query) =>
                $query->from("categories")
                    ->whereColumn("categories.id", "posts.category_id")
                    ->where("categories.slug", $filters["c"])
            ); */

            $query->whereHas('category', fn($query)=>
                $query->where('slug', $filters['c'])
            );
        }

        if ($filters["a"] ?? false) {
            $query->whereHas('author', fn($query)=>
                $query->where('username', $filters['a'])
            );
        }
        
        return $query;
    }
}
