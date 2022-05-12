<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class CommentsShow extends Component
{
    public $comments;

    public function mount(Idea $idea)
    {
        $this->comments = $idea->comments;
    }
    public function render()
    {
        return view('livewire.comments-show');
    }
}
