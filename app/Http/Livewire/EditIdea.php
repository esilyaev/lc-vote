<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;


class EditIdea extends Component
{
    public $idea;
    public $title;
    public $description;
    public $category;

    protected $rules = [
        'title' => 'required|min:4',
        'category' => 'required|integer|exists:categories,id',
        'description' => 'required|min:4',
    ];

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
        $this->title = $idea->title;
        $this->description = $idea->description;
        $this->category = $idea->category_id;
    }

    public function editIdea()
    {
        if (auth()->guest()) {
            return redirect()->route('login');
        }


        if (auth()->user()->cannot('update', $this->idea)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $this->idea->update([
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category,
        ]);

        $this->idea->save();

        $this->emit('ideaWasUpdated', 'Idea was updated successfully');

        // session()->flash('success_message', 'Idea was added successfully.');


        // return redirect()->route('idea.show', $this->idea);
    }

    public function render()
    {
        return view('livewire.edit-idea', [
            'categories' => Category::all([
                'name', 'id'
            ]),

        ]);
    }
}
