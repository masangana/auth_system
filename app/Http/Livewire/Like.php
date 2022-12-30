<?php

namespace App\Http\Livewire;

use App\Models\Place;
use Livewire\Component;

class Like extends Component
{
    public $likes = 0;

    public Place $place;

    public function mount(Place $place)
    {
        $this->place = $place;
        $this->likes = $place->like;
    }

    public function like()
    {
        $this->place->like = $this->place->like + 1;
        $this->place->save();
    }

    public function render()
    {
        return view('livewire.like');
    }
}
