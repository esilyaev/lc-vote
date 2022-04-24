<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Exceptions\VoteNotFoundException;
use App\Exceptions\DuplicateVoteException;

class IdeaShow extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea, int $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isVotedByUser(auth()->user());
    }

    public function render()
    {
        return view('livewire.idea-show');
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
