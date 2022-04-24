<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    // use WithPagination;

    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');

        return view('livewire.ideas-index', [
            'ideas' => Idea::with([
                'user:id,name,email',
                'category:id,name',
                'status:id,name',
            ])
                ->when(request()->status && request()->status !== 'all', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses[request()->status]);
                })
                ->addSelect([
                    'voted_by_user' => Vote::select('id')
                        ->where('user_id', auth()->id())
                        ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->orderBy('created_at', 'desc')
                ->simplePaginate(Idea::IDEA_COUNT_PER_PAGE)
        ]);
    }
}
