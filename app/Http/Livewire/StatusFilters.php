<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Livewire\Component;
use Illuminate\Support\Facades\Route;


class StatusFilters extends Component
{
    public $statusCount;
    public $status;
    public $category;


    public function mount()
    {
        if (Route::currentRouteName() === 'idea.show') {
            $this->status = null;
        }

        $this->statusCount = Status::GetCount();

        // dd($statusCount);
    }

    public function render()
    {
        return view('livewire.status-filters');
    }

    public function SetStatus(string $status)
    {
        $this->status = $status;
        $this->emit('query-string-updated-status', $this->status);
        if ($this->getPreviousRouteName() === 'idea.show') {
            return redirect()->route('idea.index', [
                'status' => $this->status,
            ]);
        }
    }

    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }
}
