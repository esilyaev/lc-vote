<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public $status;
    public $category;
    public $filter;
    public $searchFilter;

    protected $queryString = [
        'status',
        'category',
        'filter',
        'searchFilter'
    ];

    protected $listeners = ['query-string-updated-status' => 'onQueryStringUpdateStatus'];

    public function mount()
    {
        $this->status = request()->status ?? 'all';
        $this->category = request()->category ?? 'all';
        $this->filter = request()->filter ?? 'none';
    }
    public function onQueryStringUpdateStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->resetPage();
    }

    public function updatedFilter()
    {
        if ($this->filter === 'my') {
            if (!auth()->check()) {
                return redirect()->route('login');
            }
        }

        $this->resetPage();
    }

    public function updatedSearchFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');
        $categories = Category::all();


        // dd(request());

        $ideas = Idea::with([
            'user:id,name,email',
            'category:id,name',
            'status:id,name',
        ])
            ->when($this->status && $this->status !== 'all', function ($query) use ($statuses) {
                return $query->where('status_id', $statuses->get($this->status));
            })
            ->when($this->category && $this->category !== 'all', function ($query) use ($categories) {
                return $query->where('category_id', $categories->pluck('id', 'name')->get($this->category));
            })
            ->when($this->filter && $this->filter === 'top', function ($query) {
                return $query->orderByDesc('votes_count');
            })
            ->when($this->filter && $this->filter === 'my', function ($query) {
                return $query->where('user_id', auth()->user()->id);
            })
            ->when($this->searchFilter && strlen($this->searchFilter) >= 3, function ($query) {
                return $query->where('title', 'like', '%' . $this->searchFilter . '%');
            })
            ->addSelect([
                'voted_by_user' => Vote::select('id')
                    ->where('user_id', auth()->id())
                    ->whereColumn('idea_id', 'ideas.id')
            ])
            ->withCount('votes')
            ->withCount('comments')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(Idea::IDEA_COUNT_PER_PAGE);

        // dd($ideas);

        return view('livewire.ideas-index', [
            'ideas' => $ideas,
            'categories' => $categories,
        ]);
    }
}
