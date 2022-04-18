<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;

class CreateIdea extends Component
{
  public $title;
  public $description;
  public $category = 1;

  protected $rules = [
    'title' => 'required|min:4',
    'category' => 'required|integer|min:4',
    'description' => 'required|min:4',
  ];

  public function render()
  {
    return view('livewire.create-idea', [
      'categories' => Category::all(),
    ]);
  }


  public function createIdea()
  {
    $this->validate();

    $idea = new Idea;
    $idea->title = $this->title;
    $idea->description = $this->description;
    $idea->category_id = $this->category;
    $idea->user_id = auth()->id();
    $idea->status_id = 1;

    $idea->save();

    session()->flash('success_message', 'Idea was added successfully.');
    $this->reset();

    return redirect()->route('idea.index');
  }
}
