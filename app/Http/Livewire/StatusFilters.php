<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;


class StatusFilters extends Component
{
    public $status = 'all';
    protected $queryString = [
        'status'
    ];

    public function mount()
    {
        if (Route::currentRouteName() === 'idea.show') {
            $this->status = null;
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }

    public function SetStatus(string $status)
    {
        $this->status = $status;
        if (app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName() === 'idea.show') {
            return redirect()->route('idea.index', [
                'status' => $this->status,
            ]);
        }
    }
}
