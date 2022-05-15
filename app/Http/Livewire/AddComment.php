<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Comment;
use Livewire\Component;

class AddComment extends Component
{
    public Idea $idea;
    public $body;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }
    public function render()
    {
        return view('livewire.add-comment');
    }

    public function createComment()
    {
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'idea_id' => $this->idea->id,
            'body' => $this->body
        ]);

        $comment->save();
        $this->emit('comment-added', 'Comment added successfully');
    }
}
