<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class CommentsShow extends Component
{
    use WithPagination;

    public $idea;


    protected $listeners = ['comment-added' => 'addedComment'];

    public function addedComment()
    {
        $this->idea->refresh();
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.comments-show', ['comments' => $this->idea->comments()->with('user')->paginate(5)]);
    }
}
