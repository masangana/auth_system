<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\Type;
use Livewire\Component;

class FiltreServices extends Component
{
    public $type;

    public $query;

    public $max;

    public function render()
    {
        $types = Type::all();

        return view('livewire.filtre-services',
            [
                'types' => $types,
            ]);
    }

    public function updatedType($type)
    {
        $this->services = Service::where('type_id', $type)->get();
    }

    public function filter()
    {
        $this->emitTo('show-services', 'typeSelected', $this->type, $this->query, $this->max);
    }
}
