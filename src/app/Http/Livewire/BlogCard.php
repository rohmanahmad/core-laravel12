<?php
namespace App\Http\Livewire;

use Livewire\Component;

class BlogCard extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('themes.default.components.blog-card');
    }
}
