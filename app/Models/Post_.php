<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

Class Post 
{
    public function __construct(public $title, public $slug, public $date, public $brief, public $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->date = $date;
        $this->brief = $brief;
        $this->body = $body;
    }

    public static function all() 
    {
        return cache()->rememberForever('posts.all',function() {
            return collect(File::files(resource_path("posts")))
                ->map(function($file){
                    $document = YamlFrontMatter::parseFile((string) $file);
                    return new Post(
                        $document->title,
                        $document->slug,
                        $document->date,
                        $document->brief,
                        $document->body()
                    );
                })
                ->sortByDesc('date');
        });
    }

    public static function find($slug) 
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug) 
    {
        $post = static::find($slug);

        if (! $post) {
            throw new ModelNotFoundException();
        }
        
        return $post;
    }
    
};
?>