<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;

class IdeaIndex extends Component
{
    public $idea;
    public $votesCount;

    public function mount(Idea $idea)
    {
        $this->votesCount = $idea->votes_count;
        $this->commentsCount = $idea->comments_count;
        $this->idea = $idea;
        $this->hasVoted = $idea->voted_by_user;
    }
    public function render()
    {
        return view('livewire.idea-index');
    }

    public function vote()
    {
        if (!auth()->check()) {
            return redirect('login');
        }
        if ($this->hasVoted) {
            try {
                $this->idea->removeVote(auth()->user());
            } catch (VoteNotFoundException $th) {
                //throw $th;
            }
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            try {
                $this->idea->vote(auth()->user());
            } catch (DuplicateVoteException $e) {
                //
            }
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }
}
