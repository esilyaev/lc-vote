<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;
use Illuminate\Http\Response;

class DeleteIdea extends Component
{
    public Idea $idea;

    public function deleteIdea()
    {
        // dd(__METHOD__, $this->idea_id);

        if (auth()->guest()) {
            return redirect()->route('login');
        }

        if (auth()->user()->cannot('delete', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        Vote::destroy(Vote::where('idea_id', $this->idea->id)->get());

        Idea::destroy($this->idea->id);

        return redirect()->route('idea.index');
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.delete-idea');
    }
}
