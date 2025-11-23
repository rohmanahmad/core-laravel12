<?php
namespace App\Http\Livewire;

use Livewire\Component;

class BlogList extends Component
{
    public $posts;

    public function mount($posts)
    {
        $this->posts = $posts;
    }

    public function render()
    {
        return view('themes.default.components.blog-list');
    }
}
