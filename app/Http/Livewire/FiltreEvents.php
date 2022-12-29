<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Event;
use Livewire\Component;

class FiltreEvents extends Component
{
    public $category;

    public $start_date;

    public $end_date;

    public $location;

    public $query;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.filtre-events', 
            [
                'categories' => $categories,
            ]);
    }

    public function updatedCategory($category)
    {
        $this->events = Event::where('category_id', $category)->get();
    }

    public function filter()
    {
        $this->emitTo('show-events', 'categorySelected', $this->category, $this->start_date, $this->end_date, $this->location, $this->query);
    }
}
