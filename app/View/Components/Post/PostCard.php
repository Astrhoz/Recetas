<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostCard extends Component
{

    public $img;
    public $title;
    public $paragraph;

    /**
     * Create a new component instance.
     */
    public function __construct($img, $title, $paragraph)
    {
        $this->img = $img;
        $this->title = $title;
        $this->paragraph = $paragraph;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post.post-card');
    }
}
