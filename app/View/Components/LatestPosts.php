<?php

namespace App\View\Components;

use Closure;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestPosts extends Component
{
    public $posts;

    public function __construct($number)
    {
        $this->posts = Post::orderBy('created_at','DESC')
               ->take($number)
               ->get();
    }

    public function render()    {
        return view('components.latest-posts');
    }
}
