<?php
namespace App\Http\Livewire;

use Livewire\Component;

class BlogPagination extends Component
{
    public $paginator;

    public function mount($paginator)
    {
        $this->paginator = $paginator;
    }

    public function render()
    {
        return view('themes.default.components.blog-pagination');
    }
}
